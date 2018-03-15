<?php

namespace app\home\controller;
use app\base\controller\Base;
use think\Db;

class User extends Base{
    public function index(){
        $list = Db::name('user')->select();
        $this->assign("list",$list);
        return view();
    }

    public function disable(){
        $list = Db::name('user')->where('is_del',1)->select();
        $this->assign("list",$list);
        return view();
    }
}