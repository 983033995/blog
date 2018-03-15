<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"/data/home/qxu1141810136/htdocs/blog/application/home/view/index/index.html";i:1513133154;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />

<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="__PUBLIC__/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>zht后台测试系统</title>
<meta name="keywords" content="">
<meta name="description" content="">
<style>
    body{
        background-image: url("__PUBLIC__/temp/home/black.jpg");
        background-position: center;
        background-repeat: repeat;
        color: #FFFFFF;
    }
    .selected{
        border-bottom: none !important;
    }
    .Hui-aside .menu_dropdown dd {
        border-bottom: 1px solid #fff !important;
    }
    .Hui-aside{
        background-color: #222 ;
    }
    .Hui-aside .menu_dropdown dt,.Hui-aside .menu_dropdown dt .Hui-iconfont{
        color: #FFFFFF !important;
    }
    .Hui-aside .menu_dropdown li a{
        color: #c7c7c7 !important;
    }
    .Hui-aside .menu_dropdown li a:hover{
        color: #222 !important;
    }
    .Hui-article-box{
        background-color: rgba(0,0,0,0) !important;
    }
    .self_info{
        width: 100%;
        height:30px;
        line-height: 30px;
        overflow: hidden;
        font-family: "Microsoft Yahei", Arial, Helvetica, sans-serif;
        font-size: 14px;
        color: #0a2b1d;
    }
    .self_info .self_title{
        width: 30%;
        height: 30px;
        overflow: hidden;
        float: left;
        text-align: right;
    }
    .self_info .self_emp{
        width: 70%;
        height: 30px;
        overflow: hidden;
        float: left;
    }
    iframe{
        width: 100%;
        height: 100%;
        overflow: hidden;
    }
</style>
</head>
<body>
    <header class="navbar-wrapper">
        <div class="navbar navbar-fixed-top">
            <div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" onclick="location.reload()">ZHT后台测试系统</a>
                <span class="logo navbar-slogan f-l mr-10 hidden-xs">v3.0</span>
                <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
                <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
                    <ul class="cl">
                        <li><?php echo session('blog["pid_name"]'); ?></li>
                        <li class="dropDown dropDown_hover">
                            <a href="#" class="dropDown_A"><?php echo session('blog["user_name"]'); ?> <i class="Hui-iconfont">&#xe6d5;</i></a>
                            <ul class="dropDown-menu menu radius box-shadow">
                                <li><a href="javascript:;" onClick="myselfinfo()">个人信息</a></li>
                                <li><a onclick="exit()" href="javascript:;">退出</a></li>
                                <li><a href="/blog">博客首页</a></li>
                            </ul>
                        </li>
                        <li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger">1</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>
                        <li id="self_skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
                            <ul class="dropDown-menu menu radius box-shadow">
                                <li><a href="javascript:;" data-val="black" title="默认（黑色）" onclick="changeSkin(this)">默认（黑色）</a></li>
                                <li><a href="javascript:;" data-val="blue" title="蓝色" onclick="changeSkin(this)">蓝色</a></li>
                                <li><a href="javascript:;" data-val="green" title="绿色" onclick="changeSkin(this)">绿色</a></li>
                                <li><a href="javascript:;" data-val="red" title="红色" onclick="changeSkin(this)">红色</a></li>
                                <li><a href="javascript:;" data-val="pink" title="粉色" onclick="changeSkin(this)">粉色</a></li>
                                <li><a href="javascript:;" data-val="wall" title="墙壁" onclick="changeSkin(this)">墙壁</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <aside class="Hui-aside">
        <div class="menu_dropdown bk_2">
            <?php foreach( $data_menu['class_A'] as $k=>$v){ ?>
            <dl id="menu-article">
                <dt><i class="Hui-iconfont"><?php echo $v['icon']; ?></i> <?php echo $v['menu_name']; ?><i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                <dd>
                    <ul>
                        <?php foreach( $data_menu['class_B'] as $ko=>$vo){ if($vo['pid'] == $v['id']){ ?>
                            <li><a data-href="<?php echo $vo['url']; ?>" data-title="<?php echo $vo['menu_name']; ?>" href="javascript:void(0)"><?php echo $vo['menu_name']; ?></a></li>
                        <?php } } ?>
                    </ul>
                </dd>
            </dl>
            <?php } ?>
         </div>
    </aside>

    <div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
    <section class="Hui-article-box">
        <div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
            <div class="Hui-tabNav-wp">
                <ul id="min_title_list" class="acrossTab cl">
                    <li class="active">
                        <span title="我的桌面" data-href="welcome.html">我的桌面</span>
                        <em></em></li>
                </ul>
            </div>
            <div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
        </div>
        <div id="iframe_box" class="Hui-article">
            <div class="show_iframe">
                <div style="display:none" class="loading"></div>
                <iframe scrolling="yes" id="iframes1" frameborder="0" src="<?php echo Url('welcome'); ?>"></iframe>
            </div>
        </div>
    </section>

    <div class="contextMenu" id="Huiadminmenu">
        <ul>
            <li id="closethis">关闭当前 </li>
            <li id="closeall">关闭全部 </li>
        </ul>
    </div>
    <input type="hidden" id="theme" value="<?php echo $theme['theme']; ?>">
    <!--_footer 作为公共模版分离出去-->
    <script type="text/javascript" src="__PUBLIC__/lib/jquery/1.9.1/jquery.min.js"></script> 
    <script type="text/javascript" src="__PUBLIC__/lib/layer/2.4/layer.js"></script>
    <script type="text/javascript" src="__PUBLIC__/static/h-ui/js/H-ui.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

    <!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript" src="__PUBLIC__/lib/jquery.contextmenu/jquery.contextmenu.r2.js"></script>
    <script type="text/javascript">
         /*个人信息*/
        function myselfinfo(){
            var self_info = '<div class="self_info"><div class="self_title">账号：</div><div class="self_emp"><?php echo session('blog["user_name"]'); ?></div></div>' +
                            '<div class="self_info"><div class="self_title">身份：</div><div class="self_emp"><?php echo session('blog["pid_name"]'); ?></div></div>' +
                            '<div class="self_info"><div class="self_title">创建时间：</div><div class="self_emp"><?php echo date("Y-m-d H:m:s",$theme['set_time']); ?></div></div>';
            layer.open({
                        type: 1,
                        area: ['300px','200px'],
                        fix: false, //不固定
                        maxmin: true,
                        shade:0.4,
                        title: '我的信息',
                        content: self_info
            });
        };

        /*退出登陆*/
        function exit(){
            $.ajax({
               type: 'post',
               url: "<?php echo Url('exit_login'); ?>",
                dataType: 'json',
               success: function(data){
                   if(data.status=='1'){
                       layer.msg(data.msg);
                       setTimeout(function(){
                           location.reload();
                       },2000);
                   }
                   if(data.status=='0'){
                       layer.msg(data.msg);
                   }
               }
            });
        };

        //主题皮肤方案
         function theme(skin){
             switch (skin){
                 case 'red':
                     $(".navbar,.Hui-aside,body").css({
                         background: 'url("__PUBLIC__/temp/home/red.jpg") center repeat'
                     });
                     break;
                 case 'green':
                     $("body").css({
                         background: 'url("__PUBLIC__/temp/home/green.jpg") center no-repeat',
                         backgroundSize: '100% 100%'
                     });
                     $(".navbar").css({
                         background: 'rgba(112, 180, 15,.5)'
                     });
                     $(".Hui-aside").css({
                         background: 'rgba(112, 180, 15,.8)'
                     });
                     break;
                 case 'blue':
                     $("body").css({
                         background: 'url("__PUBLIC__/temp/home/blue.jpg") center no-repeat',
                         backgroundSize: '100% 100%'
                     });
                     $(".navbar").css({
                         background: 'rgba(22, 58, 118,.7)'
                     });
                     $(".Hui-aside").css({
                         background: 'rgba(22, 58, 118,.9)'
                     });
                     break;
                 case 'pink':
                     $("body").css({
                         background: 'url("__PUBLIC__/temp/home/pink.jpg") center no-repeat',
                         backgroundSize: '100% 100%',
                         color:'#000'
                     });
                     $(".navbar,.Hui-aside").css({
                         background: '#fcae8f'
                     });
                     break;
                 case 'wall':
                     $("body").css({
                         background: 'url("__PUBLIC__/temp/home/wall.jpg") center no-repeat',
                         backgroundSize: '100% 100%'
                     });
                     $(".navbar,.Hui-aside").css({
                         background: 'rgba(0,0,0,.5)'
                     });
                     break;
                 case 'black':
                     $("body").css({
                         background: 'url("__PUBLIC__/temp/home/black.jpg") center repeat',
                     });
                     $(".navbar,.Hui-aside").css({
                         background: '#222'
                     });
                     break;
             }
         };

         //切换皮肤主题方案
         function changeSkin(current){
             var c = $(current).attr('data-val');
             $.ajax({
                 type: 'post',
                 url: "<?php echo Url('theme'); ?>",
                 data: {theme:c},
                 dataType: 'json',
                 success: function(data){
                     if(data.status=='1'){
                         layer.msg(data.msg);
                         theme(c);
                     }
                     if(data.status=='0'){
                         layer.msg(data.msg);
                     }
                 }
             });
         };

        $(document).ready(function(){
            //进入时默认的皮肤主题
            var c = $("#theme").val();
            theme(c);
        });

//         //指定多少毫秒无动作将跳转
//         var timeout =1800000;
//         //记录当前时间
//         var occurtime=new Date().getTime() ;
//         //更新最新动作时间
////         window.onblur=function(){
////             occurtime=new Date().getTime() ;
////         };
//
//        $(window).on('keydown mousemove mousedown', function(e){
//            occurtime=new Date().getTime() ;
//        });
////         $("iframe").on('mousemove',function(){
////             occurtime=new Date().getTime() ;
////         });
//          //判断无动作时间并跳转
//         function goUrl(){
//             var a = parseInt(new Date().getTime() - occurtime) ;
//             //$("span.navbar-slogan").html('你有'+a+'毫秒没有动作了!'+(timeout - a));
//             if(a>timeout){
//                 clearInterval(refresh);
//                 layer.msg("你已经30分钟没有进行操作了，系统将在3s后自动退出！");
//                 setTimeout(function(){
//                     exit();
//                 },3000);
//
//             }
//         }
//         var refresh = window.setInterval("goUrl()",100);
    </script>
</body>
</html>