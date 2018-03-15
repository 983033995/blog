<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:76:"/data/home/qxu1141810136/htdocs/blog/application/index/view/index/index.html";i:1519465861;s:84:"/data/home/qxu1141810136/htdocs/blog/application/base/view/base/index_page_home.html";i:1520408151;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="baidu-site-verification" content="6fnAjpuwhw" />

    <meta name="keywords"content="zhangheteng.com，张鹤腾博客，个人博客，web前端，网页设计" />
    <meta name="description" content="毕业至今一直从事web前端页面设计制作，熟练运用代码编辑器使用div+css3实现前端页面的布局，熟练的掌握Photoshop，设计、构图、切图。" />
    <noscript><iframe src=*.html></iframe></noscript>
    <title>博客首页</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/static/h-ui.admin/css/style.css" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/index.css">
    <link rel="stylesheet" type="text/css" href="http://www.zhangheteng.com/Public/css/animate.css" />
    <link rel="stylesheet" href="__PUBLIC__/css/Font-Awesome-master/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/banner.css">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/chart.css">
    <script type="text/javascript" src="__PUBLIC__/lib/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/banner.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/toucher.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/index.js"></script>
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


        <!--头部logo-->
        <div class="top_log"></div>
        <!--头部logo-->

        <!--头部导航-->
        <div class="top_nav">
            <div class="nav_box">
                <div>
                    <a href="">首页</a>
                </div>
                <div>
                    <a href="">技能分享</a>
                </div>
                <div>
                    <a href="">生活记闻</a>
                </div>
                <div>
                    <a href="">学习资料</a>
                </div>
            </div>
            <div id="search_box" class="search_box border_animate1" data-time="1000">
                <div class="border-left color"></div>
                <div class="border-bottom color"></div>
                <div class="border-top color"></div>
                <div class="border-right color"></div>
                <input id="search_input" type="text" value="" placeholder="我想看" autocomplete="off">
                <div class="search_btn">
                    <i class="icon Hui-iconfont">&#xe665;</i>
                </div>
            </div>
        </div>
        <!--头部导航-->

        <!--轮播图-->
        <div class="focus_box" id="focus_box" data-changetime="<?php echo $changeTime; ?>">
            <div class="focus">
                <?php foreach( $banner as $v){ ?>
                <div class="focus_content">
                    
                    <div class="w_content">
                        <?php if($v['set_type'] == '0'): ?>
                        <div class="focus_introduce" data-wow-delay="<?php echo $v['new_york_dealy']; ?>" data-wow-duration="<?php echo $v['new_york_duration']; ?>" data-animate="<?php echo $v['new_york_animate']; ?>">
                            <?php echo $v['new_york']; ?>
                        </div>
                        <div class="focus_supply" data-wow-delay="<?php echo $v['present_img_dealy']; ?>" data-wow-duration="<?php echo $v['present_img_duration']; ?>" data-animate="<?php echo $v['present_img_animate']; ?>">
                            <img src="<?php echo $v['present_img']; ?>" />
                        </div>
                        <?php else: ?>
                        <div class="focus_supply" data-wow-delay="<?php echo $v['present_img_dealy']; ?>" data-wow-duration="<?php echo $v['present_img_duration']; ?>" data-animate="<?php echo $v['present_img_animate']; ?>">
                            <img src="<?php echo $v['present_img']; ?>" />
                        </div>
                        <div class="focus_introduce" data-wow-delay="<?php echo $v['new_york_dealy']; ?>" data-wow-duration="<?php echo $v['new_york_duration']; ?>" data-animate="<?php echo $v['new_york_animate']; ?>">
                            <?php echo $v['new_york']; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <img src="<?php echo $v['bg_img']; ?>" />
                </div>
                <?php } ?>
            </div>
            <div class="focus_nav">
                <span></span>
                <div class="bg_shade"></div>
            </div>
            <div class="arrow" id="prev"><</div>
            <div class="arrow" id="next">></div>
        </div>
        <!--轮播图-->

        <!--个人推荐-->
        <?php if(!empty($propose)){ ?>
            <div class="my_propose" id="propose">
                <div class="propose_title">
                    <h1>个人推荐</h1>
                    <h2>精选文章推荐</h2>
                </div>

                <div class="propose_content ">
                    <?php foreach( $propose as $v){ ?>
                    <div class="propose_drawer border_animate">
                        <div class="border-left"></div>
                        <div class="border-bottom"></div>
                        <div class="border-top"></div>
                        <div class="border-right"></div>
                        <a href="/blog/home/editor/article_show/sign/<?php echo $v['id']; ?>">
                            <div class="drawer_title">
                                <h2><?php echo $v['title']; ?></h2>
                                <div class="p_details">
                                    <span><img style="float: left; width: 20px; height: 20px; border-radius: 10px; -webkit-border-radius: 10px; margin-top: 5px;" src="<?php echo $v['head_portrait']; ?>"><?php echo $v['user_name']; ?></span>
                                    <span><i class="icon Hui-iconfont">&#xe681;</i><?php echo $v['category']; ?></span>
                                    <span><?php echo time2Units($v['set_time']); ?>前</span>
                                </div>
                            </div>
                            <div class="drawer_introduce"><?php echo $v['wrap']; ?></div>
                        </a>
                    </div>
                    <?php } ?>
                </div>

            </div>
        <?php } ?>
        <!--个人推荐-->

        <!--最新发布-->
            <div class="latest_release">
                <div class="release_title">最新发布</div>
                <div class="release_content ">
                    <?php foreach( $new as $v){ ?>
                    <div class="propose_drawer border_animate1" data-time="800">
                        <div class="border-left"></div>
                        <div class="border-bottom"></div>
                        <div class="border-top"></div>
                        <div class="border-right"></div>
                        <a href="/blog/home/editor/article_show/sign/<?php echo $v['id']; ?>">
                            <div class="drawer_title">
                                <h2><?php echo $v['title']; ?></h2>
                                <div class="p_details">
                                    <span><img style="float: left; width: 20px; height: 20px; border-radius: 10px; -webkit-border-radius: 10px; margin-top: 5px;" src="<?php echo $v['head_portrait']; ?>"><?php echo $v['user_name']; ?></span>
                                    <span><i class="icon Hui-iconfont">&#xe681;</i><?php echo $v['category']; ?></span>
                                    <span><?php echo time2Units($v['set_time']); ?>前</span>
                                </div>
                            </div>
                            <div class="drawer_introduce"><?php echo $v['wrap']; ?></div>
                        </a>
                    </div>
                    <?php } ?>

                </div>
            </div>
        <!--最新发布-->

        <!--热点博文-->
        <div class="my_propose">
            <div class="propose_title">
                <h1>热点博文</h1>
                <h2>来看看其他人都在关注什么</h2>
            </div>
            <div class="propose_content ">
                <?php foreach( $hot as $v){ ?>
                <div class="propose_drawer border_animate">
                    <div class="border-left"></div>
                    <div class="border-bottom"></div>
                    <div class="border-top"></div>
                    <div class="border-right"></div>
                    <a href="/blog/home/editor/article_show/sign/<?php echo $v['id']; ?>">
                        <div class="drawer_title">
                            <h2><?php echo $v['title']; ?></h2>
                            <div class="p_details">
                                <span><img style="float: left; width: 20px; height: 20px; border-radius: 10px; -webkit-border-radius: 10px; margin-top: 5px;" src="<?php echo $v['head_portrait']; ?>"><?php echo $v['user_name']; ?></span>
                                <span><i class="icon Hui-iconfont">&#xe681;</i><?php echo $v['category']; ?></span>
                                <span><i class="Hui-iconfont">&#xe725;</i><?php echo (int)$v['page_view']; ?>次</span>
                            </div>
                        </div>
                        <div class="drawer_introduce"><?php echo $v['wrap']; ?></div>
                    </a>
                </div>
                <?php } ?>

            </div>
        </div>
        <!--热点博文-->



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

<script>
    $("#search_input").searchAssociate({
        dataName: "title",
        link:"http://www.zhangheteng.com/blog/index/index/search",
        elementName:"#search_box"
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
