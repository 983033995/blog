<?php
namespace app\base\controller;
use think\Controller;
use think\Db;
use think\Session;

class Base extends Controller{
//    function __construct() {
//        parent::__construct();
//        if(!Session::get('blog["user_name"]')){
//            header("Location:" . Url('\login'), false);
//            $url="http://www.zhangheteng.com/blog/login";
//            echo '<script>window.location.href ="'.$url.'";</script>';
//            exit;
//        }
//    }

    //Ajax省份关联城市
    public function city(){
        $data = input('param.');
        $res = Db::name('district')->where('upid',$data['id'])->select();
        return json($res);
    }


    //省份、城市、地区编码转名字
    public function cityname($id){
        $res = Db::name('district')->where('id',$id)->find();
        if(empty($res)){
            return '未知';
        }else{
            return $res['name'];
        }
    }

}