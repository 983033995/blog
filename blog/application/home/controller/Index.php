<?php

namespace app\home\controller;
use app\base\controller\Base;
use think\Db;
use think\Request;
use think\Session;

class Index extends Base{
    public function index() {

        if (empty(session('blog["user_name"]'))) {
            header("Location:" . Url('\login'), false);
            exit;
        }else{
            if(session('blog["pid"]') == 0){
                $data_menu['class_A'] = Db::name('menu')->where(['type'=>0])->select();
                $data_menu['class_B'] = Db::name('menu')->where(['type'=>1])->order('rank asc')->select();
                $theme = Db::name('user')->where('id',session('blog["id"]'))->field('theme,set_time')->find();
                $this->assign('data_menu',$data_menu);
                $this->assign('theme',$theme);
                return view();
            }else{
                $data_menu['class_A'] = Db::name('menu')->where(['type'=>0,'power'=>1])->select();
                $data_menu['class_B'] = Db::name('menu')->where(['type'=>1,'power'=>1])->order('rank asc')->select();
                $theme = Db::name('user')->where('id',session('blog["id"]'))->field('theme,set_time')->find();
                $this->assign('data_menu',$data_menu);
                $this->assign('theme',$theme);
                return view();
            }
        }
    }

    //皮肤主题方案
    public function theme(){
        $data = input('param.');
        $id = session('blog["id"]');
        $res = Db::name('user')->where('id',$id)->update($data);
        if(!$res){
            $result['msg'] = '主题更换失败！';
            $result['status'] = '0';
            return json($result);
        }else{
            $result['msg'] = '主题保存成功！';
            $result['status'] = '1';
            return json($result);
        }
    }

    public function welcome(){
        $request = Request::instance();
        // 获取当前域名
        $info['domain'] = $request->domain();
        //获取服务器ip地址
        $info['ip'] = gethostbyname($_SERVER['SERVER_NAME']);
        //获取用户ip地址
        $info['ip_u'] = $request->ip();
        // 获取当前入口文件
        $info['file'] = $request->baseFile();
        // 获取当前URL地址 不含域名
        $info['url_pre'] = $request->url();
        // 获取包含域名的完整URL地址
       $info['url'] = $request->url(true);
        // 获取当前URL地址 不含QUERY_STRING
        $info['baseurl'] = $request->baseUrl();
        // 获取URL访问的ROOT地址
        $info['root'] = $request->root();
        // 获取URL访问的ROOT地址
        $info['root_t'] = $request->root(true);
        // 获取URL地址中的PATH_INFO信息
        $info['pathinfo'] = $request->pathinfo();
        // 获取URL地址中的PATH_INFO信息 不含后缀
        $info['path'] = $request->path();
        // 获取URL地址中的后缀信息
        $info['ext'] = $request->ext();
        //操作系统
        $info['os'] = PHP_OS;
        //运行环境'
        $info['server'] = $_SERVER["SERVER_SOFTWARE"];
        //PHP运行方式
        $info['sapi'] = php_sapi_name();
        //ThinkPHP版本
        $info['version'] = THINK_VERSION;
        //'服务器时间
        $info['ser_time'] = date("Y年n月j日 H:i:s");
        //北京时间
        $info['bj_time'] = gmdate("Y年n月j日 H:i:s",time()+8*3600);
        //'服务器域名/IP
        $info['ser_name'] = $_SERVER['SERVER_NAME'];
        $info['ser_ip'] = gethostbyname($_SERVER['SERVER_NAME']);
        //'剩余空间
//        $info['ser_free'] = round((disk_free_space(".")/(1024*1024)),2).'M';

        $ipInfos = GetIpLookup(session('blog["ip_next"]')); //登陆IP地址
        $this->assign('info',$info);
        $this->assign('ip_address',$ipInfos);
        return view();
    }
    
    public function exit_login(){
        $res = Session::clear('');
            if(empty($res)){
               $result['msg'] = '退出成功！';
                $result['status'] = '1';
                return json($result);
            }  else {
                $result['msg'] = '退出失败！';
                $result['status'] = '0';
                return json($result);                
            }
    }

    //轮播管理首页
    public function banner(){
        $changeTime = Db::name('banner')->where("id",1)->value('changeTime');
        $list = Db::name('banner')->where("id",'neq',1)->order('sort desc')->select();
        $this->assign([
            'changeTime'=>$changeTime,
            'list'=>$list
        ]);
        return view();
    }

    //新增轮播
    public function addbanner(){
        if(request()->isAjax()){
            $data = input('param.');
            $res = Db::name('banner')->insert($data);
            if($res){
                $reslut['msg']='添加成功';
                $reslut['status']='1';
            }else{
                $reslut['msg']='添加失败';
                $reslut['status']='0';
            }
            return json($reslut);
        }else{
            return view();
        }
    }

    //轮播时间切换
    public function changetime(){
        if(request()->isAjax()){
            $data = input('param.changeTime');
            $res = Db::name('banner')->where('id',1)->update(["changeTime"=>$data]);
            if($res){
                $reslut['msg']='保存成功';
                $reslut['status']='1';
            }else{
                $reslut['msg']='保存失败';
                $reslut['status']='0';
            }
            return json($reslut);
        }else{
            $changeTime = Db::name('banner')->where("id",1)->value('changeTime');
            $this->assign("changeTime",$changeTime);
            return view();
        }
    }

    //轮播禁用和启用
    public function state(){
        $data = input('param.');
        $res = Db::name('banner')->where('id',$data['id'])->update(["is_finish"=>$data['is_finish']]);
        if($res){
            $reslut['msg']='';
            $reslut['status']='1';
        }else{
            $reslut['msg']='';
            $reslut['status']='0';
        }
        return json($reslut);
    }

    //修改轮播
    public function editbanner(){
        if(request()->isAjax()){
            $data = input('param.');
            $id = $data['id'];
            $old = Db::name('banner')->where('id',$id)->field('bg_img,present_img')->find();
            unset($data['id']);
            $res = Db::name('banner')->where('id',$id)->update($data);
            if($res !== false){
                if($old['bg_img'] != $data['bg_img']){          //如果背景图发生变化，删除原来的图片
                    $path =  dirname(dirname(dirname(dirname(dirname(__FILE__))))).$old['bg_img'];
                     is_file($path) && unlink($path);
                }
                if($old['present_img'] != $data['present_img']){    //如果内容图发生变化，删除原来的图片
                    $path =  dirname(dirname(dirname(dirname(dirname(__FILE__))))).$old['present_img'];
                     is_file($path) && unlink($path);
                }
                $reslut['msg']='修改成功！';
                $reslut['status']='1';
            }else{
                $reslut['msg']='修改失败！';
                $reslut['status']='0';
            }
            return json($reslut);
        }else{
            $data = input('param.id');
            $list = Db::name('banner')->where('id',$data)->find();
            $this->assign('list',$list);
            return view();
        }
    }

    //删除轮播
    public function bannerdel(){
        $data = input('param.id');
        $res = Db::name('banner')->where('id',$data)->delete();
        if($res){
            $reslut['msg']='删除成功！';
            $reslut['status']='1';
        }else{
            $reslut['msg']='删除失败！';
            $reslut['status']='0';
        }
        return json($reslut);
    }

    //个人推荐管理
    public function propose(){
        $map['p.type']= 1;
        $list = Db::name('editor')
                ->alias('e')
                ->field('e.id,e.user_name,e.set_time,e.title,e.category,e.wrap,e.status,e.show')
                ->join('summary_propose p','p.index_id=e.id','LEFT')
                ->where($map)
                ->select();
        $this->assign("list",$list);
        return view();
    }

    //编辑个人推荐
    public function editpropose(){
        $data = Db::name('editor')->where('status',1)->select();
        $propose = Db::name('propose')->where('type',1)->select();
        $propose_list = json_encode($propose);

        $this->assign([
            'list' => $data,
            'propose' => $propose_list
        ]);
        return view();
    }

    //添加推荐
    public function groom(){
        $data = input('param.id');
        $map['type'] = 1;
        $map['index_id'] = $data;
        $map['sort'] = 0;

        $res = Db::name('propose')->insert($map);
        if($res){
            $reslut['msg']='';
            $reslut['status']='1';
        }else{
            $reslut['msg']='';
            $reslut['status']='0';
        }
        return json($reslut);
    }

    //取消推荐
    public function abrogate(){
        $data = input('param.');
        $res = Db::name('propose')->where("id",$data['id'])->delete();
        if($res){
            $reslut['msg']='';
            $reslut['status']='1';
        }else{
            $reslut['msg']='';
            $reslut['status']='0';
        }
        return json($reslut);
    }

}
