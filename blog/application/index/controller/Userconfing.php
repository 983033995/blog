<?php

namespace app\index\controller;
use app\base\controller\Base;
use think\Db;
use think\Session;

class Userconfing extends Base {
    public function index(){
        $sessiion = Session::get('blog["user_name"]');
        $sessiion_id = Session::get('blog["id"]');
        if(empty($sessiion)){
            $url="http://www.zhangheteng.com/blog/login";
            echo '<script>window.location.href ="'.$url.'";</script>';
        }else{
            $list = Db::name('user')->where('id',$sessiion_id)->find();
            $province = Db::name('district')->where('level',1)->select();
            if(!empty($list['province'])){
                $city = Db::name('district')->where('upid',$list['province'])->select();
                $this->assign("city",$city);
            }
            if(!empty($list['city'])){
                $area = Db::name('district')->where('upid',$list['city'])->select();
                $this->assign("area",$area);
            }
            $this->assign([
                "title" => "编辑资料",
                'list' => $list,
                "province" => $province,
                "info_integrity" => info_integrity($sessiion_id)
            ]);
            return view();
        }
    }

    public function edit_userinfo(){
        $data = input('param.');
        if(isset($data['speciality'])){
            $data['speciality'] = implode(',',$data['speciality']).',';
        }

        $sessiion_id = Session::get('blog["id"]');
        $is_edit = Db::name('user')->where($data)->find();
        if(!empty($is_edit)){
            $result['status']='2';
            $result['msg']='内容未发生变化！';
        }else{
            $res = Db::name('user')->where('id',$sessiion_id)->update($data);
            if (!empty($res)) {
                $result['status']='1';
                $result['msg']='编辑成功';
            }else{
                $result['status']='0';
                $result['msg']='编辑失败';
            }
        }
        return json($result);
    }

    //更换头像
    public function edit_heardimg(){
        $data = input('param.');
        $sessiion_id = Session::get('blog["id"]');
        $res = Db::name('user')->where("id",$sessiion_id)->update(["head_portrait" => $data['head_portrait']]);
        if (!empty($res)) {
            Session::set('blog["head_portrait"]', $data['head_portrait']);
            $result['status']='1';
            $result['msg']='头像保存成功';
            $ori1 = 'http://www.zhangheteng.com/forum/Public/images/default_avatar_64_64.jpg';
            $ori2 = "http://www.zhangheteng.com/forum/Uploads/Avatar/1/594cc100c3004_128_128.png";
            if($data['old_img'] == $ori1 || $data['old_img'] == $ori2){
            }else{
                $oldImg = str_replace('.png','',$data['head_portrait']);
                $delateImg[0] = $data['old_img'];
                $delateImg[1] = $oldImg.'.original.png';
                $delateImg[2] = $oldImg.'.original.jpg';
                $delateImg[3] = $oldImg.'.original.jpeg';
                $delateImg[4] = $oldImg.'.original.gif';
                foreach ( $delateImg as $k => $v){
                    $path =  dirname(dirname(dirname(dirname(dirname(__FILE__))))).str_replace("http://www.zhangheteng.com/","/",$v);
                    $dateimg = is_file($path) && unlink($path);
                }
            }
        }else{
            $result['status']='0';
            $result['msg']='头像保存失败';
        }
        return json($result);
    }

    //删除多余的图片
    public function deleteImg(){
        $data = input('param.');
        foreach ( $data as $k => $v){
            $path =  dirname(dirname(dirname(dirname(dirname(__FILE__))))).str_replace("http://www.zhangheteng.com/","/",$v);
            $res = is_file($path) && unlink($path);
        }
        return $res;
    }

    //密码修改验证
    public function check_password(){
        $data = input('param.');

        $res = Db::name('user')->where(['user_name' => $data['user_name'],'pass_word' => md5($data['old_password'])])->find();
        if(empty($res)){
            $result['status']='2';
            $result['msg']='旧密码不正确';
        }else{
            $res1 = Db::name('user')->where('id',$res['id'])->update(['pass_word'=>md5($data['true_password'])]);
            if($res1){
                $result['status']='1';
                $result['msg']='密码修改成功';
            }else{
                $result['status']='0';
                $result['msg']='密码修改失败';
            }
        }
        return $result;
    }

}