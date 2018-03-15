<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:76:"/data/home/qxu1141810136/htdocs/blog/application/home/view/editor/index.html";i:1520316895;s:78:"/data/home/qxu1141810136/htdocs/blog/application/base/view/base/user_page.html";i:1520403626;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="baidu-site-verification" content="6fnAjpuwhw" />

    <meta name="keywords"content="zhangheteng.com，张鹤腾博客，个人博客，web前端，网页设计" />
    <meta name="description" content="毕业至今一直从事web前端页面设计制作，熟练运用代码编辑器使用div+css3实现前端页面的布局，熟练的掌握Photoshop，设计、构图、切图。" />
    <noscript><iframe src=*.html></iframe></noscript>
    <title><?php if(!empty($title)){ echo $title;}else{ echo "个人主页";} ?></title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/static/h-ui.admin/css/style.css" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/index.css">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="http://www.zhangheteng.com/Public/css/animate.css" />
    <link rel="stylesheet" href="__PUBLIC__/css/Font-Awesome-master/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/chart.css">
    <script type="text/javascript" src="__PUBLIC__/lib/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/chart/ipad.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/chart/scrollBar.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/chart/mychart.js"></script>

    <script type="application/x-javascript">
        //屏蔽无关的报错
        //        function resumeerror() {return true;}
        //        window.onerror=resumeerror;
    </script>

    <script language="javascript">
        //      	if (self!=top) window.top.location.replace(self.location);  //防止被iframe
    </script>
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge;chrome=1"><![endif]-->
    <!--网站推送-->
    <script>
        (function(){
            var bp = document.createElement('script');
            var curProtocol = window.location.protocol.split(':')[0];
            if (curProtocol === 'https'){
                bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
            }
            else{
                bp.src = 'http://push.zhanzhang.baidu.com/push.js';
            }
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(bp, s);
        })();
    </script>
</head>

<body>
<nav class="breadcrumb">
    <div class="personal_home">
        <a href="http://www.zhangheteng.com">个人主页</a>
        <a href="http://www.zhangheteng.com/blog">博客主页</a>
    </div>
    <?php if (!empty(session('blog["user_name"]'))){ ?>
    <div class="tip_right">
        <div class="tip_bar exist">
            <a href="javascript:;">
            <span class="head_portrait">
                <?php if(!empty(session('blog["head_portrait"]'))){ echo '<img src="'.session('blog["head_portrait"]').'" />'; }else{ echo '<i class="icon Hui-iconfont">&#xe705;</i>';} ?>
            </span>
                <?php echo session('blog["user_name"]'); ?><i class="Hui-iconfont">&#xe6d5;</i>
            </a>
            <div class="tip_bar_con">
                <div class="bg-wrap">
                    <?php if(!empty(session('blog["cover_img"]'))){ echo '<img src="<?php echo session("blog["cover_img"]"); ?>" />'; }else{ echo '<img src="http://www.zhangheteng.com/blog/public/editor/attached/image/20171207/20171207093349_40049.png" />'; } ?>
                </div>
                <div class="my_bg_info">
                    <div class="nickname">
                        <div class="bg-avatar">
                            <a href="" title="更换头像"><?php if(!empty(session('blog["head_portrait"]'))){ echo '<img src="'.session('blog["head_portrait"]').'" />'; }else{ echo '<i class="icon Hui-iconfont">&#xe705;</i>';} ?></a>
                        </div>
                        <span><?php echo session('blog["user_name"]'); ?></span>
                    </div>
                    <div class="bg-numb">
                        <a title="文章数">文章<span><?php echo session('blog["edit_num"]'); ?></span></a>
                        <a title="粉丝数">粉丝<span><?php echo session('blog["fans_num"]'); ?></span></a>
                        <a title="关注数">关注<span><?php echo session('blog["follow_num"]'); ?></span></a>
                    </div>
                </div>
                <div class="grade_bar">
                    <div class="grade">等级：<?php echo (int)session('blog["grade"]'); ?></div>
                    <div class="experience">
                        <div>经验值:</div>
                        <div class="strip"><div style="width: <?php echo (int)session('blog["experience"]')*2; ?>%;"></div>
                    </div>
                    <span class="experience_num"><?php echo (int)session('blog["experience"]'); ?></span>/50
                </div>
            </div>
            <div class="link-wrap">
                <div>
                    <a href="http://www.zhangheteng.com/blog/index/user/index/id/<?php echo session('blog["id"]'); ?>.html"><i class="icon Hui-iconfont">&#xe60d;</i>个人主页</a>
                </div>
                <div>
                    <a href="http://www.zhangheteng.com/blog/index/userconfing"><i class="icon Hui-iconfont">&#xe61d;</i>修改资料</a>
                </div>
                <div>
                    <a href="javascript:;" onclick="exit()"><i class="icon Hui-iconfont">&#xe726;</i>注销登陆</a>
                </div>
            </div>
        </div>
    </div>
    <div class="dope" id="dope">
        <a style="text-decoration: none;" title="消息"><i class="icon Hui-iconfont">&#xe686;</i></a>
        <div class="tip_bar_num" id="tip_bar_num"></div>
        <div class="classify_box">
            <div class="horn"></div>
            <div class="classify_details" id="classify_details"></div>
            <div class="ignore"><span href="javascript:;" onclick="ignore()">忽略全部</span></div>
        </div>
    </div>
    <input type="hidden" id="message_count" value="0">
    <div class="message_memory" id="message_memory"></div>
    <div class="classify">
        <i class="icon Hui-iconfont">&#xe681;</i>
        <div class="classify_box">
            <div class="horn"></div>
            <a href="http://www.zhangheteng.com/blog/index/user/index/id/<?php echo session('blog["id"]'); ?>.html">个人主页</a>
            <a href="/blog/home/editor">发布文章</a>
            <a href="/blog/home/editor/article">我的文章</a>
            <a href="">消息中心</a>
            <a href="">我的收藏</a>
            <a href="javascript:;" onclick="exit()">注销登陆</a>
            <?php if(session('blog["pid"]') == 0){ echo '<a href="http://www.zhangheteng.com/blog/home">管理后台</a>'; } ?>
        </div>
    </div>
    </div>
    <?php }else{ ?>
    <div class="tip_right">
        <div class="login_nav">
            <a class="login_bar" href="http://www.zhangheteng.com/blog/login/">登陆<i class="Hui-iconfont">&#xe6d5;</i></a>
            <a class="register" href="http://www.zhangheteng.com/blog/login/index/register">注&nbsp;册</a>
        </div>
    </div>
    <?php } ?>
</nav>
<div class="blog_box">
    
<link href="http://www.zhangheteng.com/blog/public/cropper/assets/css/bootstrap.min.css" rel="stylesheet">
<link href="http://www.zhangheteng.com/blog/public/cropper/dist/cropper.min.css" rel="stylesheet">
<link href="http://www.zhangheteng.com/blog/public/cropper/index/css/main.css" rel="stylesheet">
<link href="http://www.zhangheteng.com/blog/public/css/Font-Awesome-3.2.1/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="__PUBLIC__/editor/themes/default/default.css" />
<link rel="stylesheet" href="__PUBLIC__/editor/plugins/code/prettify.css" />
<style>
    span.ke-outline[data-name="preview"],span.ke-outline[data-name="multiimage"],span.ke-outline[data-name="baidumap"],span.ke-outline[data-name="about"],span.ke-outline[data-name="source"],span.ke-outline[data-name="print"],span.ke-outline[data-name="code"],span.ke-outline[data-name="flash"],span.ke-outline[data-name="media"],span.ke-outline[data-name="insertfile"]{
        display: none;
    }
    .bg_nav{
        width: 100%;
        height: 100%;
        background-color: rgba(178,178,178,.2);
        position: absolute;
        top: 0;
        left: 0;
        z-index: 99;
    }
    .close_tip{
        width: 80px;
        height: 30px;
        position: absolute;
        top: 0px;
        left: 5px;
        z-index: 1000;
        cursor: pointer;
        overflow: hidden;
    }
    .tip_animate{
        animation: zoomInUp linear 1s;
        -webkit-animation: zoomInUp linear 1s;
        -moz-animation: zoomInUp linear 1s;
        -ms-animation: zoomInUp linear 1s;
    }
    .tip_exit{
        animation: zoomOut linear 1s;
        -webkit-animation: zoomOut linear 1s;
        -moz-animation: zoomOut linear 1s;
        -ms-animation: zoomOut linear 1s;
    }
    .tip_box{
        width: 100%;
        height:auto;
        text-align: center;
    }
</style>

<style>
    .blog_box{
        background-color: #e9edf0 !important;
    }
    .confing_box{
        width: 1100px;
        overflow: hidden;
        margin: 50px auto 20px auto;
    }
    .confing_content_left{
        width: 200px;
        height: auto;
        overflow: hidden;
        float: left;
        margin-right: 20px;
    }
    .c_left_top{
        width: 100%;
        height: 150px;
        background-color: #0e90d2;
        border-radius: 8px;
        margin-bottom: 10px;
        text-align: center;
        overflow: hidden;
        color: #FFFFFF;
        font-weight: bold;
    }
    .c_left_top > img{
        display: block;
        width: 90px;
        height: 90px;
        border-radius: 100%;
        margin: 15px auto 7px auto;
    }
    .c_left_details{
        width: 100%;
        height: auto;
        overflow: hidden;
        background: #FFFFFF;
        position: relative;
        padding: 10px 0;
    }
    .c_left_details_shadow{
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 10;
    }
    .c_left_nav{
        width: 80%;
        padding: 10px 10%;
        border-bottom: 1px solid #e2e2e2;
        font-size: 14px;
        cursor: pointer;
        color: #6f6f6f;
    }
    .c_left_nav:hover{
        border-left: 2px solid #0e90d2;
    }
    .c_left_current{
        border-left: 2px solid #0e90d2;
        color: #0e90d2;
    }
    .confing_content_right{
        width: 880px;
        height: auto;
        min-height: 500px;
        overflow: hidden;
        float: right;
        background-color: #FFFFFF;
    }
    .c_right_barbox{
        width: 100%;
        height: auto;
        overflow: hidden;
    }
    .c_barbox_top{
        width: 90%;
        padding: 10px 0;
        margin: 0 auto;
        font-size: 16px;
        border-bottom: 1px solid #eeeeee;
    }
    .form-label{
        text-align: right;
    }
    .row{
        margin: 10px 0px;
        font-size: 12px !important;
    }
    .address select {
        width: auto;
        float: left;
        max-width: 120px;
        margin-right: 10px;
    }
    .form-control {
        display: block;
        width: 100%;
        padding: 0px 8px;
        font-size: 13px;
        line-height: 1.53846154;
        color: #222;
        vertical-align: middle;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 0;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    }
    span.select-box > .check-box{
        width: 110px;
        padding: 0 !important;
    }
    option {
        font-weight: normal;
        display: block;
        white-space: pre;
        min-height: 1.2em;
        padding: 0px 2px 1px;
    }
    iframe{
        width: 100%;
        height: 100%;
        overflow: hidden;
    }
    .breadcrumb{
        padding: 0 !important;
        margin: 0 !important;
    }
    nav .dope, .classify{
        width: 30px !important;
    }
    .breadcrumb span{
        padding: 0 !important;
    }

    p{
        text-indent: 2em;
    }
    .c_box{
        width: 90%;
        height: auto;
        overflow: hidden;
        background-color: #FFFFFF;
        margin: 40px auto;
        padding: 20px 5%;
    }
    .title{
        width: 100%;
        height: auto;
        min-height: 24px;
        font-family: "Microsoft Yahei", "Hiragino Sans GB", "Helvetica Neue", Helvetica, tahoma, arial, "WenQuanYi Micro Hei", Verdana, sans-serif, "\5B8B\4F53";
        font-size: 22px;
        line-height: 24px;
        font-weight: bold;
        text-align: center;
        margin: 15px 0;
    }
    .details{
        width: 80%;
        height:26px;
        margin: 10px auto;
        color: #999;
        font-size: 12px;
        line-height: 26px;

    }
    .category{
        height: 26px;
        padding: 0 0 30px;
        float: left;
    }
    .time{
        overflow: hidden;
        height: 26px;
        float: right;
    }
    .time span{
        margin: 0 10px;
    }
    table.my_table{
        font-family: "Consolas", "Bitstream Vera Sans Mono", "Courier New", Courier, monospace !important;
        border: 1px solid #DDDDDD;

    }
    table.my_table tr:nth-child(even){
        background-color: #fbfbfb !important;
    }
    table.my_table tr:nth-child(odd){
        background-color: #FFFFFF !important;
    }
    .text_box {
        overflow: hidden;
        width: 100%;
        height: auto;
    }
    a.break{
        margin-right: 50px;
    }
    div.none{
        width: 80%;
        height:100px;
        margin: 0px auto;
        text-align: center;
        line-height: 100px;
        font-size: 18px;
    }
    .tip_top_a{
        position: fixed !important;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 9999;
        animation: fadeInDown 1s linear;
        -webkit-animation: fadeInDown 0.5s linear;
        -moz-animation: fadeInDown 0.5s linear;
        -ms-animation: fadeInDown 0.5s linear;
    }
    .tip_top_a1{
        position: fixed !important;
        z-index: 9999;
        animation: fadeInLeft 1s linear;
        -webkit-animation: fadeInLeft 0.5s linear;
        -moz-animation: fadeInLeft 0.5s linear;
        -ms-animation: fadeInLeft 0.5s linear;
    }
    .u_user_title {
        width: 90%;
        height: 50px;
        position: relative;
        border-bottom: 1px solid #eeeeee;
        margin-left: 5%;
        margin-bottom: 40px;
    }
    .u_user_title > div {
        min-width: 50px;
        padding: 0 15px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        border-bottom: 3px solid #1ABC9C;
        position: absolute;
        bottom: -3px;
        left: 0;
    }
</style>

<div class="confing_box">
    <div class="confing_content_left">
        <a href="http://www.zhangheteng.com/blog/index/user/index/id/<?php echo $user_info['id']; ?>">
            <div class="c_left_top">
                <img src="<?php echo $user_info['head_portrait']; ?>">
                <?php echo $user_info['user_name']; ?>
            </div>
        </a>
        <div class="c_left_details">
            <p>文章：<?php echo $user_info['editor_num']; ?></p>
            <p>关注用户数：<?php echo $user_info['follow']; ?></p>
            <p>粉丝数：<?php echo $user_info['fans']; ?></p>
            <p>擅长技能：<?php echo $user_info['speciality']; ?></p>
            <p>职业：<?php echo $user_info['job']; ?></p>
            <div id="sign_line"></div>
        </div>
    </div>

    <div class="confing_content_right">
        <div class="c_right_barbox">
            <form name="" method="post" action="<?php echo Url('index'); ?>" class="form form-horizontal" id="form-article-add">
                <div class="u_user_title">
                    <div>文章发布</div>
                </div>

                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">标题：</label>
                    <div class="formControls col-xs-8 col-sm-4">
                        <input type="text" class="input-text must" name="title" id="title" value="" placeholder="请输入文章标题" />
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">分类：</label>
                    <div class="formControls col-xs-8 col-sm-4">
                    <span class="select-box">
                        <select class="select must" name="category" id="category" placeholder="请选择文章分类" >
                            <option></option>
                            <option value="HTML">HTML</option>
                            <option value="CSS">CSS</option>
                            <option value="Javascript">Javascript</option>
                            <option value="JQuery">JQuery</option>
                            <option value="PHP">PHP</option>
                            <option value="Mysql">Mysql</option>
                            <option value="插件技能">插件技能</option>
                            <option value="其它">其它</option>
                        </select>
                    </span>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">内容简介：</label>
                    <div class="formControls col-xs-8 col-sm-4">
                        <textarea name="wrap" id="wrap" cols="" rows="" class="textarea must" maxlength="200"  placeholder="内容简介...最少输入10个字符" datatype="*10-200" dragonfly="true" nullmsg="备注不能为空！"></textarea>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">内容：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <textarea name="content" style="width:100%;height:300px;visibility:hidden;" ></textarea>
                    </div>
                </div>
                <div class="tip_box"></div>
                <div class="row cl">
                    <div class="col-xs-8 col-sm-3 col-xs-offset-4 col-sm-offset-5">
                        <button onClick="return article_save_submit();"  class="btn btn-primary radius" id="submit" type="button">提交</button>
                        <button class="btn btn-default radius ml1r" type="button" id="preview">内容预览</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>




    <footer class="footer mt-20">
        <div class="container-fluid">
            <nav>
                <a href="www.zhangheteng.com">关于我</a>
                <!--<span class="pipe">|</span>-->
                <!--<a href="#">联系我</a>-->
                <!--<span class="pipe">|</span>-->
            </nav>
            <p>
                Copyright &copy;2016 H-ui.net All Rights Reserved. <br>
                <a href="javascript:;" rel="nofollow">滇ICP备16002296号-1</a><br>
            </p>
        </div>
    </footer>
</div>

<script type="text/javascript" src="__PUBLIC__/lib/layer/2.4/layer.js"></script>

<script>
    /*退出登陆*/
    function exit(){
        $.ajax({
            type: 'post',
            url: "http://www.zhangheteng.com/blog/home/index/exit_login",
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
</script>
<!-- JiaThis Button BEGIN -->
<script type="text/javascript" >
    var jiathis_config={
        data_track_clickback:true,
        siteNum:6,
        sm:"fav,tsina,qzone,weixin,cqq,renren",
        summary:"",
        ralateuid:{
            "tsina":"more-live-more-base"
        },
        showClose:false,
        shortUrl:false,
        hideMore:true
    }
</script>

<script type="text/javascript" src="__PUBLIC__/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->
<script charset="utf-8" src="__PUBLIC__/editor/kindeditor.js"></script>
<script charset="utf-8" src="__PUBLIC__/editor/lang/zh_CN.js"></script>
<script charset="utf-8" src="__PUBLIC__/editor/plugins/code/prettify.js"></script>
<script>
    var editor;
    KindEditor.ready(function(K) {
        editor = K.create('textarea[name="content"]', {
            allowFileManager : true
        });
        var editor1 = K.create('textarea[name="content"]', {
            cssPath : '__PUBLIC__/editor/plugins/code/prettify.css',
            uploadJson : '__PUBLIC__/editor/php/upload_json.php',
            fileManagerJson : '__PUBLIC__/editor/php/file_manager_json.php',
            newlineTag: 'p',
            autoHeightMode : true,
            allowFileManager : true,
            afterCreate : function() {
                var self = this;
                this.loadPlugin('autoheight');
            }
        });
        prettyPrint();
        var tip = '<div class="d_tip" style="position: absolute; width: 297px; height: 273px; z-index: 999; margin-left: -174px;"><img src="__PUBLIC__/temp/home/code_tip.png"><div class="close_tip"></div></div>';
        var ring = '<div class="ring" style="width: 24px; height: 22px; border: 2px solid red; position: absolute; z-index: 111;"></div>';
        var bg_nav = '<div class="bg_nav"></div>';
        var t_left = $('.ke-icon-insertorderedlist').offset().left;
        var t_top = $('.ke-icon-insertorderedlist').offset().top;
        var ttp = '<span style="color: red;">提示：</span>如果需要写代码，请把代码放在“编号”标签中。';
        $("body").append(bg_nav);
        $(".bg_nav").append(tip).append(ring);
        $(".d_tip").css({"top":t_top+15,"left":t_left}).addClass("tip_animate");
        $(".ring").css({"top":t_top-4,"left":t_left-4});
        $(".close_tip,.bg_nav").click(function(){
            $(".bg_nav").css("background-color","rgba(0,0,0,0)").addClass("tip_exit");
            setTimeout(function(){
                $(".bg_nav").hide();
                $(".tip_box").css("padding","10px 0").html(ttp);
                layer.tips('代码用该标签包裹',$('.ke-icon-insertorderedlist'),{tips: [1,'#5FB878'],time:8*1000});
                $(".layui-layer-content").css({"margin-left":"-15px"});
            },900);
        });
    });

    $("#preview").click(function(){
        $(".ke-icon-preview").click();
        setTimeout(function(){
            $(".ke-dialog").css({"top":"50%","margin-top":"-242px"});
        },700);
    });
    $("span[data-name='preview']").click(function(){
        alert(1);
    });
    $("#wrap").Huitextarealength({
        minlength:10,
        maxlength:200
    });

    $(document).bind('keydown',function(event){
        switch (event.keyCode){
            case 27:
                $("span.ke-icon-fullscreen").click();
                break;
        };
    });

    function article_save_submit(){
        var num=0;
        var str = '';
        var wrap_l = $("#wrap").val().length;
        $(".must").each(function () {
            if ($(this).val() == "") {
                this.focus();
                num++;
                str = $(this).attr("placeholder")+"</br>";
                return false;
            }

        });
        if(num>0)
        {
            layer.msg(str);
            return false;
        }else if(wrap_l < 10) {
            layer.msg("内容简介不能少于10个字");
            return false;
        }else if(editor.isEmpty() == true){
            layer.msg("请输入文章内容");
            return false;
        }
        else
        {
            var title = $("#title").val();
            var category = $("#category").val();
            var wrap = $("#wrap").val();
            var content = editor.html();
            $.ajax({
                type: 'POST',
                url: '<?php echo Url("index"); ?>',
                data:{title:title,category:category,wrap:wrap,content:content},
                dataType: 'json',
                success: function(data){
                    if(data.status=='1'){
                        layer.msg(data.msg);
                        setTimeout("location.reload();",3000);
                    }
                    if(data.status=='0'){
                        layer.msg(data.msg);
                    }
                },
                error:function(data) {
                    if(data.status=='0'){
                        layer.msg(data.msg);
                    }
                },
            });
        }
    };

</script>


<script type="text/javascript" src="http://v3.jiathis.com/code_mini/jiathis_r.js?uid=2136980&btn=r2.gif&move=1" charset="utf-8"></script>
<!-- JiaThis Button END -->

<!--访问量统计-->
<div class="fwltj">
    <script language="javascript" type="text/javascript" src="//js.users.51.la/19217273.js"></script>
    <noscript><a style="display: block;width: 20px; height: 20px; margin: 0 auto;" href="//www.51.la/?19217273"><img alt="&#x6211;&#x8981;&#x5566;&#x514D;&#x8D39;&#x7EDF;&#x8BA1;" src="//img.users.51.la/19217273.asp" style="border:none" /></a></noscript>
</div>
<!--访问量统计-->
<div id="chart_window"></div>

</body>
</html>
