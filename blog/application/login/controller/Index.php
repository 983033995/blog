<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\login\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\Session;
use think\captcha;
use think\Url;

class Index extends Controller {
    public function index(){
        if (Request::instance()->isAjax()){
            $data = input('param.');
            $map['user_name'] = $data['user_name'];
            $map['pass_word'] = md5($data['pass_word']);
            $res = Db::name('user')->where($map)->find();

            if(!empty($res)){
                if($res['stat'] == 0){
                    //Ajax返回结果
                    $result['msg'] = '账号还未激活，请到邮箱激活！';
                    $result['status'] = '0';
                    return json($result);
                }else{
                    $edit_num = Db::name('editor')->where('user_name',$res['user_name'])->select();
                    $fans_num = Db::name('follow')->where('floow_who',$res['id'])->count();             //该用户的粉丝数
                    $follow_num = Db::name('follow')->where('who_floow',$res['id'])->count();             //该用户的关注数
                    Session::set('blog["user_name"]',$data['user_name']);               //验证成功写入session缓存
                    Session::set('blog["id"]',$res['id']);
                    Session::set('blog["pid"]',$res['pid']);
                    Session::set('blog["pass_word"]', md5($data['pass_word']));
                    Session::set('blog["ip_next"]', $res['ip_next']);
                    Session::set('blog["land"]', (int)$res['land']);
                    Session::set('blog["set_time"]', date("Y-m-d H:i:s",$res['set_time']));
                    Session::set('blog["pid_name"]', $res['pid_name']);
                    Session::set('blog["login_time"]', date("Y-m-d H:i:s",$res['login_time']));
                    Session::set('blog["grade"]', $res['grade']);
                    Session::set('blog["experience"]', $res['experience']);
                    Session::set('blog["head_portrait"]', $res['head_portrait']);
                    Session::set('blog["cover_img"]', $res['cover_img']);
                    Session::set('blog["edit_num"]', count($edit_num));
                    Session::set('blog["fans_num"]', $fans_num);
                    Session::set('blog["follow_num"]', $follow_num);

                    $request = Request::instance();
                    $up['land'] = $res['land']+1;
                    $up['ip_next'] = $request->ip();
                    $up['login_time'] = time();

                    if(date("Y-m-d") !== date("Y-m-d",$res['login_time'])){
                        if($res['experience'] > 48){
                            $up['experience'] = 0;
                            $up['grade'] = $res['grade']+1;
                        }else{
                            $up['experience'] = $res['experience']+1;
                        }
                    }

                    Db::name('user')->where('id',$res['id'])->update($up);
                    //Ajax返回结果
                    $result['msg'] = '登陆成功，页面即将跳转......';
                    $result['status'] = '1';
                    $result['info_integrity'] = info_integrity($res['id']);
                    return json($result);
                }
            }  else {
                $result['msg'] = '账号或密码错误！';
                $result['status'] = '0';
                return json($result);                
            }
        }else{
            if(!isset($_SERVER['HTTP_REFERER'])){
                $href = 0;
            }else{
                $href = $_SERVER['HTTP_REFERER'];
            }
            $this->assign("href",$href);
           return view();
        }
        
    }

    //找回密码验证
    public function forgot(){
        $data = input('param.');
        $email = Db::name('user')->where('email',$data['email'])->find();
        if(!captcha_check($data['code'])){  //验证失败
            $result['msg'] = '验证码错误！';
            $result['status'] = '0';
            return json($result);
        }else{
            if(!empty($email)){
                if($email['stat'] == 0){
                    $result['status'] = '0';
                    $result['msg']="邮箱尚未激活，请先到邮箱激活！";
                }else{
                    $user=Db::name('user');
                    $emailID=encode($email['email']);
                    $emailkey=md5(randStr(6,3));
                    $keydate=time();
                    $user->where(array('email'=>$email['email']))->update(array('email_key'=>$emailkey,'datatime'=>$keydate));
                    $content="尊敬的".$email['user_name']."，你好：<br>你在zht测试系统 v3.1申请找回密码，重设密码地址请点击:<a href='http://www.zhangheteng.com/blog/login/index/modify/?emailkey=".encode($emailkey)."&email=".$emailID."&user_name=".$email['user_name']."'>http://www.zhangheteng.com/blog/login/index/modify/?emailkey=".encode($emailkey)."&email=".$emailID."&user_name=".$email['user_name']."</a>(或者复制到浏览器打开)，完成密码修改！";
                    $ema=sendEmailTo($email['email'], $email['user_name'], 'zht测试系统 v3.1密码重置', $content);
                    if($ema){
                        $result['status'] = '1';
                        $result['msg']="邮件发送成功,请及时查收!";
                    }else{
                        $result['status'] = '0';
                        $result['msg']="邮件发送失败(1102)";
                    }
                }
                return json($result);
            }else{
                $result['msg'] = '邮箱不存在！';
                $result['status'] = '0';
                return json($result);
            }
        };
        exit;
    }

    //忘记密码
    public function modify(){
        if (Request::instance()->isGet()){
            $get=$_GET;
            $user=Db::name('user');;
            $result=$user->where( array('email'=>decode($get['email']),'email_key'=>decode($get['emailkey'])))->select();

            if ($result){
                $keytime=(int)$result[0]['datatime'];
                $presenttime=time();
                $agotime=($presenttime-$keytime);

                if($agotime > 600){
                    if($result[0]['stat'] == 0){
                        $this->error('邮箱尚未激活，请先激活邮箱后再进行该操作！',Url('index'));
                    }else if($result[0]['stat'] == 1){
                        $this->error('超过10分钟，链接已失效，请重新进行该操作！',Url('index'));
                    }
                }else{
                    if($result[0]['stat'] == 0){
                        $this->error('邮箱尚未激活，请先激活邮箱后再进行该操作！',Url('index'));
                    }else if($result[0]['stat'] == 1){
                        $this->success('验证成功，正在跳转密码重置页面','http://www.zhangheteng.com/blog/login/index/reset/?id='.encode($result[0]['id']));
                    }
                }
            }else{
                $this->success('链接已失效，请重新进行该操作！',Url('index'));
            }
        }
    }

    //密码修改页面
    public function reset(){
        if(Request::instance()->isAjax()){
            $info = input('param.');
            if($info['type'] == 1){
                $res = Db::name('user')->where(['id'=>$info['id'],'pass_word'=>md5($info['pass_word'])])->find();
                if(empty($res)){
                    $result['msg'] = '新密码可用！';
                    $result['status'] = '0';
                    return json($result);
                }else{
                    $result['msg'] = '新密码不能和原密码相同！';
                    $result['status'] = '1';
                    return json($result);
                }
            }
            if($info['type'] == 2){
                $res = Db::name('user')->where(['id'=>$info['id']])->update(['pass_word'=>md5($info['pass_word'])]);
                if(!$res){
                    $result['msg'] = '密码修改失败！';
                    $result['status'] = '0';
                    return json($result);
                }else{
                    $result['msg'] = '密码修改成功，即将跳转登陆！';
                    $result['status'] = '1';
                    return json($result);
                }
            }
        }else{
            $data = input('param.id');
            if(empty($data)){
                $this->error('请从重置密码的邮件中的链接进入！',Url('index'));
            }else{
                $res = Db::name('user')->where('id',decode($data))->find();
                $this->assign('data_list',$res);
                return view();
            }
        }
     }

    public function register(){
        if(!isset($_SERVER['HTTP_REFERER'])){
            $href = 0;
        }else{
            $href = $_SERVER['HTTP_REFERER'];
        }
        $this->assign("href",$href);
        return view();
    }

    //注册账号发送邮件验证
     public function add(){
         $data = input('param.email');
         $record = input('param.');
         $request = Request::instance();
         $map['user_name'] = $record['user_name'];
         $map['pass_word'] = md5($record['pass_word']);
         $map['pid'] = 1;
         $map['pid_name'] = '新兵蛋子';
         $map['set_time'] = time();
         $map['ip_next'] = $request->ip();
         $map['email'] = $record['email'];
         $map['stat'] = 0;
         $map['grade'] = 1;
         $map['experience'] = 1;
         $map['head_portrait'] = 'http://www.zhangheteng.com/forum/Public/images/default_avatar_64_64.jpg';
         $map['signature'] = '我也还没想好说什么O(∩_∩)O';
         $res = Db::name('user')->where(array('email'=>$data,'stat'=>0))->find();
         if(!empty($res)){
             $result['msg'] = '你的账号已经激活，不需要再次激活！';
             $result['status'] = '0';
             return json($result);
         }else{
             if(Request::instance()->isAjax()){
                 $user=Db::name('user');
                 $user->insert($map);
                 $emailID=encode($data);
                 $emailkey=md5(randStr(6,3));
                 $keydate=time();
                 $content="欢迎您注册zht测试系统 v3.1后台模版<br>注册成功，你在本站注册的邮箱需要验证！请点击<a href='http://www.zhangheteng.com/blog/login/index/checkid/?emailkey=".encode($emailkey)."&email=".$emailID."'>http://www.zhangheteng.com/blog/login/index/checkid/?emailkey=".encode($emailkey)."&email=".$emailID."</a>(或者复制到浏览器打开)，完成验证！";
                 $ema=sendEmailTo($data, $record['user_name'], '邮箱验证', $content);
                 if($ema){
                     $user->where(array('email'=>$data))->setField(array('email_key'=>$emailkey,'datatime'=>$keydate));
                     $result['status'] = '1';
                     $result['msg']="邮件发送成功，请到邮箱激活账号";
                 }else{
                     $result['status'] = '0';
                     $result['msg']="邮件发送失败(1102)";
                 }
                 return json($result);
             }
         }
    }

    //邮箱激活
    public function checkid(){
        $get=$_GET;
        $user=Db::name('user');
        $result=$user->where( array('email'=>decode($get['email']),'email_key'=>decode($get['emailkey'])))->select();
        if ($result){
            $keytime=$result[0]['datatime'];
            $presenttime=time();
            $agotime=($presenttime-$keytime);

            if($agotime > 600){
                if($result[0]['stat'] == 0){
                    Db::name('user')->where('id',$result[0]['id'])->delete();
                    echo "超过10分钟,链接失效";
                }else if($result[0]['stat'] == 1){
                    $this->success('邮箱已经激活过，请到登录页直接登陆！',Url('index'));
                }
            }else{
                if($result[0]['stat'] == 1){
                    $this->success('邮箱已经激活过，请到登录页直接登陆！',Url('index'));
                }else{
                    $user->where( array('email'=>decode($get['email']),'email_key'=>decode($get['emailkey'])))->setField('stat','1');
                    $map = [
                        "send_id" => 1,
                        "recevie_id" => $result[0]['id'],
                        "set_time" => time(),
                        "content" => "欢迎您的加入，希望我们能在这里获得帮助，共同成长！"
                    ];
                    Db::name('message')->insert($map);
                    $this->success('激活成功',Url('index'));
                }
            }
        }
        else{
            $this->success('激活失败重新激活',Url('index'));
        }
    }

    function randStr($length=4,$type="1"){
        $array = array(
            '1' => '0123456789',
            '2' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            '3' => '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',
        );
        $string = $array[$type];
        $count = strlen($string)-1;
        $rand = '';
        for ($i = 0; $i < $length; $i++) {
            $rand .= $string[mt_rand(0, $count)];
        }
        return $rand;
    }

    //邮箱和账号是否存在
    public function proving(){
        $data = input('param.');
        if($data['type'] == 1){
            $res = Db::name('user')->where('user_name',$data['data'])->find();
            if(!empty($res)){
                $result['status'] = '0';
                $result['msg']="名称已被占用！";
                return json($result);
            }else{
                $result['status'] = '1';
                $result['msg']="名称可用！";
                return json($result);
            }
        }
        if($data['type'] == 2){
            $res = Db::name('user')->where('email',$data['data'])->find();
            if(!empty($res)){
                $result['status'] = '0';
                $result['msg']="邮箱已被注册！";
                return json($result);
            }else{
                $result['status'] = '1';
                $result['msg']="邮箱可用！";
                return json($result);
            }
        }
    }
}