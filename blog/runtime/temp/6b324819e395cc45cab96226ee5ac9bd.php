<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"/data/home/qxu1141810136/htdocs/blog/application/index/view/user/index.html";i:1520320237;s:78:"/data/home/qxu1141810136/htdocs/blog/application/base/view/base/user_page.html";i:1520403626;}*/ ?>
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
    
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/user.css">
    <div class="u_content_box">
        <?php if(empty($list)){ ?>
            <div>该用户不存在！</div>
        <?php }else{ ?>
        <div class="u_uc">
            <?php if($list['cover_img'] == ''): ?><img src="http://www.zhangheteng.com/blog/public/editor/attached/image/20171207/20171207093349_40049.png" /><?php else: ?><img src="<?php echo $list['cover_img']; ?>" /><?php endif; ?>
            <div class="u_avt_wrap">
                <div class="u_top_headimg">
                    <?php if($list['head_portrait'] == ''): ?><img src="http://www.zhangheteng.com/forum/Public/images/default_avatar_128_128.jpg" /><?php else: ?><img src="<?php echo $list['head_portrait']; ?>" /><?php endif; ?>
                </div>
                <div class="u_user_name" id="self_name"><?php echo $list['user_name']; ?></div>
                <div class="u_f_g">
                    <span><span id="fans_num"><?php echo $fans; ?></span>&nbsp;&nbsp;粉丝</span>
                    <span class="u_fen_ge">/</span>
                    <span><?php echo $con_num; ?>&nbsp;&nbsp;关注</span>
                </div>
            </div>
            <div class="u_signature">
                个性签名：<?php if($list['signature'] == ''): ?>我也还没想好说什么O(∩_∩)O<?php else: ?><?php echo $list['signature']; endif; ?>
            </div>
            <div class="u_group">
                <?php if($follow == '1'): ?>
                <div class="u_chart" onclick="start_chart(this)" id="" data-receiver="<?php echo $list['id']; ?>" data-sender="<?php echo session('blog["id"]'); ?>">
                    <i class="icon Hui-iconfont">&#xe6c5;</i>&nbsp;聊天
                </div>
                <div class="u_follow" data-follow-who="<?php echo $list['id']; ?>" data-who-follow="<?php echo session('blog["id"]'); ?>">
                    <?php if($con == 0){ ?>
                    <a onclick="follow(this)" style="background-color: rgba(0,0,0,.45);">
                        <i class="icon Hui-iconfont">&#xe600;</i>&nbsp;关注
                    </a>
                    <?php }else{ ?>
                    <a onclick="cel_follow(this)" style="background-color: #0079d0;" title="取消关注">已关注</a>
                    <?php } ?>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="u_cont">
            <div class="u_cont_left">
                <div class="u_user_info u_cont_current">资料</div>
                <div class="u_user_editor" data-id="<?php echo $list['user_name']; ?>">文章</div>
                <div class="u_user_follow" data-id="<?php echo $list['id']; ?>">关注</div>
                <div class="u_user_fans" data-id="<?php echo $list['id']; ?>">粉丝</div>
            </div>

            <div class="u_cont_right">
                <div class="u_right_user">
                    <div class="u_user_title">
                        <div>基本信息</div>
                    </div>
                    <div class="u_user_content">
                        <div class="u_row">
                            <div class="u_row_tip">昵称：</div>
                            <div class="u_row_tip_intr"><?php echo $list['user_name']; ?></div>
                        </div>
                        <div class="u_row">
                            <div class="u_row_tip">性别：</div>
                            <div class="u_row_tip_intr"><?php if($list['sex'] == ''): ?>未知<?php else: ?><?php echo $list['sex']; endif; ?></div>
                        </div>
                        <div class="u_row">
                            <div class="u_row_tip">年龄：</div>
                            <div class="u_row_tip_intr"><?php if($list['age'] == ''): ?>未知<?php else: ?><?php echo $list['age']; endif; ?></div>
                        </div>
                        <div class="u_row">
                            <div class="u_row_tip">生日：</div>
                            <div class="u_row_tip_intr"><?php if($list['birthday'] == ''): ?>未知<?php else: ?><?php echo $list['birthday']; endif; ?></div>
                        </div>
                        <div class="u_row">
                            <div class="u_row_tip">所在地：</div>
                            <div class="u_row_tip_intr"><?php if($list['province'] == ''): ?>未知<?php else: ?><?php echo $list['province']; ?>-<?php echo $list['city']; ?>-<?php echo $list['area']; endif; ?></div>
                        </div>
                        <div class="u_row">
                            <div class="u_row_tip">qq：</div>
                            <div class="u_row_tip_intr"><?php if($list['qq_num'] == ''): ?>未知<?php else: ?><?php echo $list['qq_num']; endif; ?></div>
                        </div>
                        <div class="u_row">
                            <div class="u_row_tip">职业：</div>
                            <div class="u_row_tip_intr"><?php if($list['job'] == ''): ?>未知<?php else: ?><?php echo $list['job']; endif; ?></div>
                        </div>
                        <div class="u_row">
                            <div class="u_row_tip">擅长技能：</div>
                            <div class="u_row_tip_intr"><?php if($list['speciality'] == ''): ?>未知<?php else: ?><?php echo $list['speciality']; endif; ?></div>
                        </div>
                        <div class="u_row">
                            <div class="u_row_tip">等级：</div>
                            <div class="u_row_tip_intr"><?php echo (int)$list['grade']; ?>&nbsp;级</div>
                        </div>
                        <div class="u_row">
                            <div class="u_row_tip">个性签名：</div>
                            <div class="u_row_tip_intr"><?php if($list['signature'] == ''): ?>我也还没想好说什么O(∩_∩)O<?php else: ?><?php echo $list['signature']; endif; ?></div>
                        </div>
                    </div>
                </div>

                <div class="u_right_load_box">

                </div>
            </div>

        </div>
        <?php } ?>
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

<script type="text/javascript" src="__PUBLIC__/js/user.js"></script>
<script>
    function follow(current){           //添加关注
        var father = $(current).parent('.u_follow');
        var follow_who = father.attr("data-follow-who");
        var who_follow = father.attr("data-who-follow");
        var fans = Number($("#fans_num").text());
        $.ajax({
            type : 'POST' ,
            url: '<?php echo Url("follow"); ?>',
            data: {follow_who:follow_who,who_follow:who_follow},
            dataType: 'json',
            success: function(data){
                if(data.status=='1'){
                    layer.msg(data.msg);
                    var ht = '<a onclick="cel_follow(this)" style="background-color: #0079d0;" title="取消关注">已关注</a>';
                    father.html(ht);
                    $("#fans_num").html(fans+1);
                }else {
                    layer.msg(data.msg);
                }
            },
            error:function(data) {
                console.log(data.msg);
            }
        });
    }

    function cel_follow(current){      //取消关注
        var father = $(current).parent('.u_follow');
        var follow_who = father.attr("data-follow-who");
        var who_follow = father.attr("data-who-follow");
        var fans = Number($("#fans_num").text());
        $.ajax({
            type : 'POST' ,
            url: '<?php echo Url("cel_follow"); ?>',
            data: {follow_who:follow_who,who_follow:who_follow},
            dataType: 'json',
            success: function(data){
                if(data.status=='1'){
                    layer.msg(data.msg);
                    var ht = '<a onclick="follow(this)" style="background-color: rgba(0,0,0,.45);"><i class="icon Hui-iconfont">&#xe600;</i>&nbsp;关注</a>';
                    father.html(ht);
                    $("#fans_num").html(fans-1);
                }else {
                    layer.msg(data.msg);
                }
            },
            error:function(data) {
                console.log(data.msg);
            }
        });
    }
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
