<?php

namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\Session;

class Index extends Controller{
    public function index(){

        $banner = Db::name('banner')->where('id','neq',1)->where('is_finish',1)->order('sort desc')->select();      //轮播图
        $changeTime = Db::name('banner')->where('id',1)->value('changeTime');           //轮播切换时间
        $map['p.type']= 1;
        $propose = Db::name('editor')                   //个人推荐
            ->alias('e')
            ->field('e.id,e.user_name,e.set_time,e.title,e.category,e.wrap,e.status,e.show,u.head_portrait')
            ->join('summary_propose p','p.index_id=e.id','LEFT')
            ->join('summary_user u','u.id = e.user_id','LEFT')
            ->where($map)
            ->select();
        $new = Db::name('editor')
            ->alias('e')
            ->where('status',1)
            ->field("e.id,e.user_name,e.set_time,e.title,e.category,e.wrap,u.head_portrait")
            ->join('summary_user u','u.id = e.user_id','LEFT')
            ->order('set_time desc')
            ->limit(3)
            ->select();   //最新发布
        $hot = Db::name('editor')
            ->alias('e')
            ->where('status',1)
            ->field("e.id,e.user_name,e.set_time,e.title,e.category,e.wrap,e.page_view,u.head_portrait")
            ->join('summary_user u','u.id = e.user_id','LEFT')
            ->order('page_view desc')
            ->limit(3)
            ->select();        //热点博文

        $this->assign([
            "banner" => $banner,
            "changeTime" => $changeTime,
            "propose" => $propose,
            "new" => $new,
            "hot" => $hot
        ]);
        return view();
    }

    public function search(){
        $data = input('param.search');
        if(request()->isAjax()){
            if(!empty($data)){
                $cont = '%'.$data.'%';
                $list = Db::name('editor')->where('title','like',$cont)->field('title')->select();

                return json($list);
            }
        }else{

        }
    }
}