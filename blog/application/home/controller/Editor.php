<?php
/**
 * Created by PhpStorm.
 * User: zht
 * Date: 2017/10/31
 * Time: 15:17
 */

namespace app\home\controller;

use think\Controller;
use think\Request;
use think\Db;
use think\File;
use think\Url;

class Editor extends Controller {
    public function index(){
        if (empty(session('blog["user_name"]'))) {
            $url="http://www.zhangheteng.com/blog/login";
            echo '<script>window.location.href ="'.$url.'";</script>';
            exit;
        }else {
            if (Request::instance()->isPost()) {
                $data = input('param.');
                $map['user_name'] = session('blog["user_name"]');
                $map['user_id'] = session('blog["id"]');
                $map['set_time'] = time();
                $map['title'] = $data['title'];
                $map['category'] = $data['category'];
                $map['wrap'] = $data['wrap'];
                $map['content'] = $data['content'];
                $map['page_view'] = 0;
                if(session('blog["pid"]') == 0){
                    $map['status'] = 1;
                }else{
                    $map['status'] = 0;
                }
                $res = Db::name('editor')->insert($map);
                $userId = Db::name('editor')->getLastInsID();
                if($res){
                    if(session('blog["pid"]') == 0){
                        $reslut['msg']='发布成功！';
                    }else{
                        $map = [
                            "send_id" => session('blog["id"]'),
                            "recevie_id" => 1,
                            "set_time" => time(),
                            "content" => session('blog["user_name"]')."发布了新文章，请注意到后台审核！"
                        ];
                        Db::name('message')->insert($map);
                        $reslut['msg']='发布成功！请等待管理员审核。';
                    }
                    $reslut['status']='1';
                }else{
                    $reslut['msg']='添加失败';
                    $reslut['status']='0';
                }
                return json($reslut);
            } else {
                $user_info = Db::name('user')
                    ->alias('u')
                    ->join('summary_editor e','u.id = e.user_id','LEFT')       //发布的文章数
                    ->where('u.id',session('blog["id"]'))
                    ->field('u.*,COUNT(e.user_id) as editor_num')
                    ->find();
                $user_info['follow'] = Db::name('follow')->where('who_floow',session('blog["id"]'))->count();
                $user_info['fans'] = Db::name('follow')->where('floow_who',session('blog["id"]'))->count();
                $this->assign('user_info',$user_info);
                $this->assign('title','文章发布');
                return view();
            }
        }
    }

    //已发布文章
    public function article(){
        if (empty(session('blog["user_name"]'))) {
            $url="http://www.zhangheteng.com/blog/login";
            echo '<script>window.location.href ="'.$url.'";</script>';
            exit;
        } else {
            if (session('blog["pid"]') == '0') {
                $data = input('param.page');
                $res = Db::name('editor')->where('status',1)->order('set_time desc')->paginate(10);
                $this->assign('content', $res->toArray());
                $this->assign('list', $res);
                $this->assign('page_num', $data);
            } else {
                $data = input('param.page');
                $user_name = session('blog["user_name"]');
                $res = Db::name('editor')->where('user_name', $user_name)->where('status',1)->order('set_time desc')->paginate(10);
                $this->assign('content', $res->toArray());
                $this->assign('list', $res);
                $this->assign('page_num', $data);
            }
            return view();
        }
    }

    //文章公开或者仅自己可见
    public function overt(){
        $data = input('param.');
        $id = $data['id'];
        $show = $data['show'];
        if($show == 0){
            $res = Db::name('editor')->where('id',$id)->update(["show"=>1]);
        }elseif($show == 1){
            $res = Db::name('editor')->where('id',$id)->update(["show"=>0]);
        }
        if($res){
            $reslut['msg']='操作成功！';
            $reslut['status']='1';
        }else{
            $reslut['msg']='操作失败！';
            $reslut['status']='0';
        }
        return json($reslut);
    }

    //待发布文章
    public function publisher(){
        if (empty(session('blog["user_name"]'))) {
            $url="http://www.zhangheteng.com/blog/login";
            echo '<script>window.location.href ="'.$url.'";</script>';
            exit;
        } else {
            if(session('blog["pid"]') == '0'){
                $map[] = ['exp','status <> 1'];
            }else{
                $map[] = ['exp','status <> 1'];
                $map['user_name'] = session('blog["user_name"]');
            }
            $data = input('param.page');
            $res = Db::name('editor')->where($map)->order('set_time desc')->paginate(10);
            $this->assign('content', $res->toArray());
            $this->assign('list', $res);
            $this->assign('page_num', $data);
            return view();
        }
    }

    /**
    * 文章审核发布
     **/
    public function release(){
        $data = input('param.');
        $user = Db::name('user')->where('id',$data['recevie_id'])->find();      //文章发布者的信息
        if($data['operate'] == 1){              //审核同意，同意发布
            // 启动事务
            Db::startTrans();
            try{
                $res = Db::name('editor')->where('id',$data['id'])->update(["status" => 1]);
                $map = [
                    "send_id" => 1,
                    "recevie_id" => $data['recevie_id'],
                    "set_time" => time(),
                    "content" => "你发布的“".$data['title']."”已审核通过！本次获得5积分。"
                ];
                $message = Db::name('message')->insert($map);
                $experience = $user['experience']+5;
                if($experience > 49){
                    $where['experience'] = $experience - 50;
                    $where['grade'] = $user['grade']+1;
                    $intg = Db::name('user')->where('id',$data['recevie_id'])->update($where);
                }else{
                    $intg = Db::name('user')->where('id',$data['recevie_id'])->update(['experience' => $experience]);
                }
                // 提交事务
                Db::commit();
                if(!empty($res) && !empty($message) && !empty($intg)){
                    $result['status']='1';
                    $result['msg']='发布成功！';
                }else{
                    $result['status']='0';
                    $result['msg']='发布失败！';
                }
            } catch (\Exception $e) {
                // 回滚事务
                Db::rollback();
            }
        }else if($data['operate'] == 3){        //审核不通过，驳回文章
            // 启动事务
            Db::startTrans();
            try{
                $res = Db::name('editor')->where('id',$data['id'])->update(["status" => 3]);
                $map = [
                    "send_id" => 1,
                    "recevie_id" => $data['recevie_id'],
                    "set_time" => time(),
                    "content" => "你发布的“".$data['title']."”已被管理员驳回，文章发布失败！"
                ];
                $message = Db::name('message')->insert($map);
                // 提交事务
                Db::commit();
                if(!empty($res) && !empty($message)){
                    $result['status']='1';
                    $result['msg']='驳回成功！';
                }else{
                    $result['status']='0';
                    $result['msg']='驳回失败！';
                }
            } catch (\Exception $e) {
                // 回滚事务
                Db::rollback();
            }
        }
        return json($result);
    }

    //删除多余的图片
    public function deleteImg(){
        $data = input('param.path');
        $path =  dirname(dirname(dirname(dirname(dirname(__FILE__)))))."$data";
        return is_file($path) && unlink($path);
    }

    public function article_list(){
        if(request()->isAjax()){
        }else{
            $data = input('param.');
            $res = Db::name('editor')->where('id',$data['sign'])->find();
            if($res['status'] == '1'){
                Db::name('editor')->where('id',$data['sign'])->update(['page_view'=>$res['page_view']+1]);
            }
            $this->assign('list',$res);
            return view();
        }
    }

    public function article_show(){
        if(request()->isAjax()){
        }else{
            $data = input('param.');
            $res = Db::name('editor')->where('id',$data['sign'])->find();
            if($res['status'] == '1'){
                Db::name('editor')->where('id',$data['sign'])->update(['page_view'=>$res['page_view']+1]);
            }
            $user_info = Db::name('user')
                ->alias('u')
                ->join('summary_editor e','u.id = e.user_id','LEFT')       //发布的文章数
                ->where('u.id',$res['user_id'])
                ->field('u.*,COUNT(e.user_id) as editor_num')
                ->find();
            $user_info['follow'] = Db::name('follow')->where('who_floow',$res['user_id'])->count();
            $user_info['fans'] = Db::name('follow')->where('floow_who',$res['user_id'])->count();

            $this->assign('list',$res);
            $this->assign('user_info',$user_info);
            $this->assign('title',$res['title']);
            return view();
        }

    }

}