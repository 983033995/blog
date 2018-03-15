<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"/data/home/qxu1141810136/htdocs/blog/application/index/view/user/chart.html";i:1515662200;s:78:"/data/home/qxu1141810136/htdocs/blog/application/base/view/base/user_page.html";i:1515655393;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="baidu-site-verification" content="6fnAjpuwhw" />

    <meta name="keywords"content="zhangheteng.com，张鹤腾博客，个人博客，web前端，网页设计" />
    <meta name="description" content="毕业至今一直从事web前端页面设计制作，熟练运用代码编辑器使用div+css3实现前端页面的布局，熟练的掌握Photoshop，设计、构图、切图。" />
    <noscript><iframe src=*.html></iframe></noscript>
    <title>个人主页</title>
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
        <a target="_blank" href="http://www.zhangheteng.com">个人主页</a>
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
                    <a target="_blank" href="http://www.zhangheteng.com/blog/index/user/index/id/<?php echo session('blog["id"]'); ?>.html"><i class="icon Hui-iconfont">&#xe60d;</i>个人主页</a>
                </div>
                <div>
                    <a href=""><i class="icon Hui-iconfont">&#xe61d;</i>修改资料</a>
                </div>
                <div>
                    <a href="javascript:;" onclick="exit()"><i class="icon Hui-iconfont">&#xe726;</i>注销登陆</a>
                </div>
            </div>
        </div>
    </div>
    <div class="dope">
        <a style="text-decoration: none;" title="消息"><i class="icon Hui-iconfont">&#xe686;</i></a>
    </div>
    <div class="classify">
        <i class="icon Hui-iconfont">&#xe681;</i>
        <div class="classify_box">
            <div class="horn"></div>
            <a target="_blank" href="http://www.zhangheteng.com/blog/index/user/index/id/<?php echo session('blog["id"]'); ?>.html">个人主页</a>
            <a href="/blog/home/editor">发布文章</a>
            <a href="/blog/home/editor/article">我的文章</a>
            <a href="">消息中心</a>
            <a href="">我的收藏</a>
            <a href="javascript:;" onclick="exit()">注销登陆</a>
            <?php if(session('blog["pid"]') == 0){ echo '<a target="_blank" href="http://www.zhangheteng.com/blog/home">管理后台</a>'; } ?>
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
    

<div id="ipad">
    <div class="ipad-title"><h1>与admin的聊天</h1></div>

    <span class="T"></span>
    <span class="R"></span>
    <span class="B"></span>
    <span class="L"></span>
    <span class="TR"></span>
    <span class="BR"></span>
    <span class="BL"></span>
    <span class="LT"></span>

    <div class="ipad-cont">
        <div class="textArea">
            <div class="dialog_box">
                <span class="dialog_time">2018年1月9日  09:45:23</span>
                <div class="other_side">
                    <div class="head_img">
                        <img src="http://www.zhangheteng.com/forum/Public/images/default_avatar_64_64.jpg" />
                    </div>
                    <div class="dialog_c">
                        <div class="dialog_arrow"></div>
                        <div class="dialog_W">你好！很高心认识你呀，我们可以交个朋友吗？</div>
                    </div>
                </div>
            </div>
            <div class="dialog_box">
                <span class="dialog_time">2018年1月9日  09:45:58</span>
                <div class="self_side">
                    <div class="head_img">
                        <img src="http://www.zhangheteng.com/forum/Uploads/Avatar/1/594cc100c3004_128_128.png" />
                    </div>
                    <div class="dialog_c">
                        <div class="dialog_arrow"></div>
                        <div class="dialog_W">nice to meet you too !</div>
                    </div>
                </div>
            </div>
            <div class="dialog_box">
                <span class="dialog_time">2018年1月9日  09:45:23</span>
                <div class="other_side">
                    <div class="head_img">
                        <img src="http://www.zhangheteng.com/forum/Public/images/default_avatar_64_64.jpg" />
                    </div>
                    <div class="dialog_c">
                        <div class="dialog_arrow"></div>
                        <div class="dialog_W">你好！很高心认识你呀，我们可以交个朋友吗？</div>
                    </div>
                </div>
            </div>
            <div class="dialog_box">
                <span class="dialog_time">2018年1月9日  09:45:58</span>
                <div class="self_side">
                    <div class="head_img">
                        <img src="http://www.zhangheteng.com/forum/Uploads/Avatar/1/594cc100c3004_128_128.png" />
                    </div>
                    <div class="dialog_c">
                        <div class="dialog_arrow"></div>
                        <div class="dialog_W">nice to meet you too !</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ipad-bar"><i class="bar"></i></div>
    <div class="chart_p">

    </div>

    <div class="dialog_send">
        <div class="send_words">
            <textArea id="dialog_text" placeholder=""></textArea>
            <i id="chart_look" class="icon Hui-iconfont">&#xe68e;</i>
            <div id="dialog_look" class="dialog_look">
                <div class="look_top">
                    <div class="look_title">常用表情</div>
                    <div id="look_close" class="look_close"><i class="icon Hui-iconfont">&#xe6a6;</i></div>
                </div>
                <div class="look_icon">
                    <div class='loader loader--circularSquare'></div>
                </div>
            </div>
        </div>
        <div class="send_bar" onclick="sendMessage()">发送</div>
    </div>
</div>




    <footer class="footer mt-20">
        <div class="container-fluid">
            <nav>
                <a href="www.zhangheteng.com" target="_blank">关于我</a>
                <!--<span class="pipe">|</span>-->
                <!--<a href="#" target="_blank">联系我</a>-->
                <!--<span class="pipe">|</span>-->
            </nav>
            <p>
                Copyright &copy;2016 H-ui.net All Rights Reserved. <br>
                <a href="javascript:;" target="_blank" rel="nofollow">滇ICP备16002296号-1</a><br>
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

<script>
    $(function () {
        $('#ipad').ipad({
            width: 500,
            height: 400,
            limitedWidth: 400,
            limitedHeight: 300,
            dragLimited: true
        });

        ipadScrollBar();
    });

</script>

<script type="text/javascript" src="http://v3.jiathis.com/code_mini/jiathis_r.js?uid=2136980&btn=r2.gif&move=1" charset="utf-8"></script>
<!-- JiaThis Button END -->

<!--访问量统计-->
<div class="fwltj">
    <script language="javascript" type="text/javascript" src="//js.users.51.la/19217273.js"></script>
    <noscript><a style="display: block;width: 20px; height: 20px; margin: 0 auto;" href="//www.51.la/?19217273" target="_blank"><img alt="&#x6211;&#x8981;&#x5566;&#x514D;&#x8D39;&#x7EDF;&#x8BA1;" src="//img.users.51.la/19217273.asp" style="border:none" /></a></noscript>
</div>
<!--访问量统计-->
<div id="chart_window"></div>

</body>
</html>
