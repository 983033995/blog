<?php

namespace app\index\controller;
use app\base\controller\Base;
use think\Db;
use think\Session;

class User extends Base{
    public function index(){
        $data = input('param.id');
        $sessiion = Session::get('blog["user_name"]');
        $sessiion_id = Session::get('blog["id"]');
        if(empty($sessiion)){
            $url="http://www.zhangheteng.com/blog/login";
            echo '<script>window.location.href ="'.$url.'";</script>';
        }else{
            $list = Db::name('user')->where("id",$data)->find();
            $list['province'] = $this->cityname($list['province']);
            $list['city'] = $this->cityname($list['city']);
            $list['area'] = $this->cityname($list['area']);
            if($data == $sessiion_id){
                $follow = 0;
                $con = '';
                $con_num = Db::name('follow')->where('who_floow',$sessiion_id)->count();
                $fans = Db::name('follow')->where('floow_who',$sessiion_id)->count();
            }else{
                $follow = 1;
                $concern = Db::name('follow')->where(['floow_who' => $data,'who_floow' =>$sessiion_id ])->find();       //判断自己是否关注过该用户
                if(empty($concern)){
                    $con = 0;           //未关注
                }else{
                    $con = 1;           //已关注
                }
                $con_num = Db::name('follow')->where('who_floow',$data)->count();
                $fans = Db::name('follow')->where('floow_who',$data)->count();
            }
        }
        $this->assign([
            "list" => $list,
            "follow" => $follow,             //识别是否是自己的资料
            "con" => $con,
            "con_num" => $con_num,
            "fans" => $fans
        ]);
        return view();
    }

    public function self_article(){
        $data = input('param.username');
        $res['total'] = Db::name('editor')->where('user_name', $data)->where('status',1)->count();
        $res['list'] = Db::name('editor')->where('user_name', $data)->where('status',1)->field("id,user_name,set_time,title,category,wrap,page_view")->order('set_time desc')->limit(20)->select();
        return json($res);
    }

    public function follow(){           //添加关注
        if (request()->isAjax()) {
            $data = input('param.');
            $map['floow_who'] = $data['follow_who'];
            $map['who_floow'] = $data['who_follow'];
            $map['create_time'] = time();
            $user_name = Db::name('user')->where('id',$data['who_follow'])->field('user_name')->find();
            $where = [
                "send_id" => $data['who_follow'],
                "recevie_id" => $data['follow_who'],
                "set_time" => time(),
                "content" => $user_name['user_name']."关注了你！"
            ];

            // 启动事务
            Db::startTrans();
            try{
                $message = Db::name('message')->insert($where);
                $res = Db::name('follow')->insert($map);
                // 提交事务
                Db::commit();
                if(!empty($res) && !empty($message)){
                    $result['status']='1';
                    $result['msg']='关注成功！';
                }else{
                    $result['status']='0';
                    $result['msg']='关注失败！';
                }
            } catch (\Exception $e) {
                // 回滚事务
                Db::rollback();
            }
            return json($result);
        }
    }

    public function cel_follow(){           //取消关注
        if (request()->isAjax()) {
            $data = input('param.');
            $map['floow_who'] = $data['follow_who'];
            $map['who_floow'] = $data['who_follow'];
            $user_name = Db::name('user')->where('id',$data['who_follow'])->field('user_name')->find();
            $where = [
                "send_id" => $data['who_follow'],
                "recevie_id" => $data['follow_who'],
                "set_time" => time(),
                "content" => $user_name['user_name']."对你取消了关注！"
            ];
            // 启动事务
            Db::startTrans();
            try{
                $message = Db::name('message')->insert($where);
                $res = Db::name('follow')->where($map)->delete();
                // 提交事务
                Db::commit();
                if(!empty($res) && !empty($message)){
                    $result['status']='1';
                    $result['msg']='取消关注成功！';
                }else{
                    $result['status']='0';
                    $result['msg']='取消关注失败！';
                }
            } catch (\Exception $e) {
                // 回滚事务
                Db::rollback();
            }
            return json($result);
        }
    }

    public function concern(){          //查询关注的人和粉丝
        if(request()->isAjax()){
            $data = input('param.');
            if($data['dif'] == "1"){        //为1时,表示查询用户关住的人
                $res = Db::name('follow')
                       ->alias('a')
                        ->join('summary_user u','a.floow_who = u.id','LEFT')
                        ->field('a.*,u.user_name,u.head_portrait,u.signature,u.id as user_id')
                       ->where('who_floow',$data['id'])
                        ->select();
                if(!empty($res)){
                    foreach($res as $k => $v){
                        $res[$k]['editor_num'] = Db::name('editor')->where('user_name',$v['user_name'])->count();       //发布的动态数
                        $res[$k]['follow'] = Db::name('follow')->where('who_floow',$v['user_id'])->count();           //该用户的关注数
                        $res[$k]['fans'] = Db::name('follow')->where('floow_who',$v['user_id'])->count();             //该用户的粉丝数
                     }
                }
            }elseif($data['dif'] == "2"){           //为2时,表示查询用户的粉丝
                $res = Db::name('follow')
                    ->alias('a')
                    ->join('summary_user u','a.who_floow = u.id','LEFT')
                    ->field('a.*,u.user_name,u.head_portrait,u.signature,u.id as user_id')
                    ->where('floow_who',$data['id'])
                    ->select();
                if(!empty($res)){
                    foreach($res as $k => $v){
                        $res[$k]['editor_num'] = Db::name('editor')->where('user_name',$v['user_name'])->count();       //发布的动态数
                        $res[$k]['follow'] = Db::name('follow')->where('who_floow',$v['user_id'])->count();           //该用户的关注数
                        $res[$k]['fans'] = Db::name('follow')->where('floow_who',$v['user_id'])->count();             //该用户的粉丝数
                    }
                }
            }
            return json($res);
        }
    }

    //聊天表情
    public function chart(){
        if(request()->isAjax()){
            $data = Db::name('look')->select();
            return json($data);
        }else{
            return view();
        }
    }

    //聊天查找聊天者信息
    public function chartuser(){
        $data = input('param.');
        $result['receiver_all'] = Db::name('talk_message')
                  ->alias('a')
                  ->join('summary_user u','a.receiver = u.id','LEFT')
                  ->where('a.sender',$data['sender'])
                  ->limit(6)
                  ->field('distinct(u.id),u.user_name,u.head_portrait')
                  ->select();
        $result['sender'] = Db::name('user')->where('id',$data['sender'])->field('id,user_name,head_portrait')->find();
        $result['receiver'] = Db::name('user')->where('id',$data['receiver'])->field('id,user_name,head_portrait')->find();
       return $result;
    }

    //聊天记录
    public function chartrecord(){
        $data = input('param.');
        $res = array();
        $res1 = Db::name('talk_message')->where(['sender'=>$data['sender'],'receiver'=>$data['receiver']])->order('set_time asc')->select();
        $res2 = Db::name('talk_message')->where(['sender'=>$data['receiver'],'receiver'=>$data['sender']])->order('set_time asc')->select();
        $res = array_merge($res1,$res2);
        sort($res);
        foreach ( $res as $v){
            if($v['status'] == 0 && $data['sender'] == $v['receiver']){
                $result = Db::name('talk_message')->where(['id' => $v['id'],'receiver' => $data['sender']])->update(['status' => 1,'read_time' => time()]);
            }
        }
        return $res;
    }

    //聊天消息发送
    public function sendmessage(){
        $data = input('param.');
        $data['set_time'] = time();
        $data['status'] = 0;
        $res = Db::name('talk_message')->insert($data);
        if($res){
            $result['msg']='发送成功';
            $result['status']='1';
        }else{
            $result['msg']='发送失败，请稍后重试！';
            $result['status']='0';
        }
        return json($result);
    }

    //发起聊天时时时接收聊天信息的方法
    public function timely(){
        $data = input('param.');
        if(!empty($data)){
            $res = Db::name('talk_message')->where(['sender'=>$data['receiver'],'receiver'=>$data['sender'],'status'=>0])->select();
        }
        return json($res);
    }

    //清除聊天消息未读状态
    public function clearstatus(){
        $data = input('param.');
        $result = Db::name('talk_message')->where('id',$data['id'])->update(['status' => 1,'read_time' => time()]);
    }

    //查询聊天信息表和消息推送表中的未读消息
    public function unread(){
        $id = Session::get('blog["id"]');
        $res_o['talk'] = Db::name('talk_message')                   //未读聊天记录
            ->alias('a')
            ->join('summary_user u','a.sender = u.id','LEFT')
            ->field('a.*,u.user_name')
            ->where(['a.receiver' => $id,'a.status' => 0])
            ->select();
        $res['talk'] = array_unset_tt($res_o['talk'],'sender');         //根据发送者去除重复数据
        $res['message'] = Db::name('message')->where(['recevie_id' => $id,'status' => 0])->select();
        return json($res);
    }

    //d单个清除未读系统消息的方法
    public function clear_message(){
        $data = input('param.');
        $res = Db::name('message')->where('id',$data['id'])->update(['status' => 1,'read_time' => time()]);
        if($res){
            $result['msg']='';
            $result['status']='1';
        }else{
            $result['msg']='';
            $result['status']='0';
        }
        return json($result);
    }

    //清除该用户所有未读消息
    public function cleardope(){
        $id = Session::get('blog["id"]');
        // 启动事务
        Db::startTrans();
        try{
            $message = Db::name('message')->where(['recevie_id' => $id,'status' => 0])->update(['status' => 1,'read_time' => time()]);
            $talk_message = Db::name('talk_message')->where(['receiver' => $id,'status' => 0])->update(['status' => 1,'read_time' => time()]);
            // 提交事务
            Db::commit();
            if(!empty($talk_message) && !empty($message)){
                $result['status']='1';
                $result['msg']='';
            }else{
                $result['status']='0';
                $result['msg']='';
            }
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
        }
        return json($result);
    }

}

?>