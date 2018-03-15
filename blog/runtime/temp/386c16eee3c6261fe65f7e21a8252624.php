<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:82:"/data/home/qxu1141810136/htdocs/blog/application/index/view/userconfing/index.html";i:1520489863;s:78:"/data/home/qxu1141810136/htdocs/blog/application/base/view/base/user_page.html";i:1520403626;}*/ ?>
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
            float: left;
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
    </style>

    <div class="confing_box">

        <div class="confing_content_left">
            <a href="http://www.zhangheteng.com/blog/index/user/index/id/<?php echo session('blog["id"]'); ?>">
                <div class="c_left_top">
                    <img src="<?php echo session('blog["head_portrait"]'); ?>">
                    <?php echo session('blog["user_name"]'); ?>
                </div>
            </a>
            <div class="c_left_details">
                <div class="c_left_details_shadow"></div>
                <div class="c_left_nav c_left_current">
                    <i class="icon Hui-iconfont">&#xe6bf;</i>
                    资料设置
                </div>
                <div class="c_left_nav">
                    <i class="icon Hui-iconfont">&#xe60a;</i>
                    头像修改
                </div>
                <div class="c_left_nav">
                    <i class="icon Hui-iconfont">&#xe63f;</i>
                    密码修改
                </div>
                <div class="c_left_nav">
                    <i class="icon Hui-iconfont">&#xe6b5;</i>
                    我的等级
                </div>
            </div>
        </div>

        <div class="confing_content_right">
            <div class="c_right_barbox">
                <div class="c_barbox_top">个人资料&nbsp;&nbsp;(完整度：<?php echo (10-$info_integrity)*10; ?>%)</div>
                <div class="page-container">
                    <form action="<?php echo Url('index'); ?>" method="post" class="form form-horizontal" id="user_selfinfo">
                        <div class="row cl">
                            <label class="form-label col-xs-4 col-sm-2">昵称：</label>
                            <div id="user_name" class="formControls col-xs-8 col-sm-7"><?php echo $list['user_name']; ?></div>
                        </div>
                        <div class="row cl">
                            <label class="form-label col-xs-4 col-sm-2">邮箱：</label>
                            <div class="formControls col-xs-8 col-sm-7"><?php echo $list['email']; ?></div>
                        </div>
                        <div class="row cl">
                            <label class="form-label col-xs-4 col-sm-2">性别：</label>
                            <div class="formControls col-xs-8 col-sm-7">
                                <label>
                                    <input type="radio" <?php if($list['sex'] == "男"){ echo 'checked="checked"';} ?> name="sex" value="男">男&nbsp;&nbsp;
                                </label>
                                <label>
                                    <input type="radio" <?php if($list['sex'] == "女"){ echo 'checked="checked"';} ?> name="sex" value="女">女&nbsp;&nbsp;
                                </label>
                                <label>
                                    <input type="radio" <?php if($list['sex'] == ""){ echo 'checked="checked"';} ?> name="sex" value="">未知
                                </label>
                            </div>
                        </div>
                        <div class="row cl">
                            <label class="form-label col-xs-4 col-sm-2">所在地：</label>
                            <div class="formControls address col-xs-8 col-sm-7">
                                <select class="form-control" name="province" id="J_province" onchange="change_city(this)">
                                    <option value="">-省份-</option>
                                    <?php foreach( $province as $v){ ?>
                                    <option value="<?php echo $v['id']; ?>" <?php if($list['province'] == $v['id']){ echo 'selected="selected"';} ?>><?php echo $v['name']; ?></option>
                                    <?php } ?>
                                </select>
                                <input type="hidden" value="<?php echo $list['province']; ?>" id="u_province">
                                <select class="form-control" name="city" id="J_city" onchange="change_district(this)">
                                    <option value="">-城市-</option>
                                    <?php if(isset($city)){ foreach($city as $v){ ?>
                                    <option value="<?php echo $v['id']; ?>" <?php if($list['city'] == $v['id']){ echo 'selected="selected"';} ?>><?php echo $v['name']; ?></option>
                                    <?php } } ?>
                                </select>
                                <input type="hidden" value="<?php echo $list['city']; ?>" id="u_city">
                                <select class="form-control" name="area" id="J_district" style="">
                                    <option value="">-州县-</option>
                                    <?php if(isset($area)){ foreach($area as $v){ ?>
                                    <option value="<?php echo $v['id']; ?>" <?php if($list['area'] == $v['id']){ echo 'selected="selected"';} ?>><?php echo $v['name']; ?></option>
                                    <?php } } ?>
                                </select>
                                <input type="hidden" value="<?php echo $list['area']; ?>" id="u_area">
                            </div>
                        </div>
                        <div class="row cl">
                            <label class="form-label col-xs-4 col-sm-2">QQ：</label>
                            <div class="formControls col-xs-8 col-sm-7">
                                <input style="width: 255px;" class="input-text" type="text" placeholder="QQ" value="<?php echo $list['qq_num']; ?>" name="qq_num">
                            </div>
                        </div>
                        <div class="row cl">
                            <label class="form-label col-xs-4 col-sm-2">生日：</label>
                            <div class="formControls col-xs-8 col-sm-7">
                                <input style="width: 255px;" class="input-text" type="date" placeholder="生日" value="<?php echo $list['birthday']; ?>" name="birthday">
                            </div>
                        </div>
                        <div class="row cl">
                            <label class="form-label col-xs-4 col-sm-2">擅长技能：</label>
                            <div class="formControls col-xs-8 col-sm-7">
                                <span class="select-box" style="width: 255px; padding-left: 25px; padding-right: 0;">
                                    <div class="check-box">
                                        <input type="checkbox" id="checkbox-1" value="javascript" name="speciality[]">
                                        <label for="checkbox-1">javascript</label>
                                    </div>
                                    <div class="check-box">
                                        <input type="checkbox" id="checkbox-2" value="c++" name="speciality[]">
                                        <label for="checkbox-2">c++</label>
                                    </div>
                                    <div class="check-box">
                                        <input type="checkbox" id="checkbox-3" value="java" name="speciality[]">
                                        <label for="checkbox-3">java</label>
                                    </div>
                                    <div class="check-box">
                                        <input type="checkbox" id="checkbox-4" value="php" name="speciality[]">
                                        <label for="checkbox-4">php</label>
                                    </div>
                                    <div class="check-box">
                                        <input type="checkbox" id="checkbox-5" value="python" name="speciality[]">
                                        <label for="checkbox-5">python</label>
                                    </div>
                                    <div class="check-box">
                                        <input type="checkbox" id="checkbox-6" value="object c" name="speciality[]">
                                        <label for="checkbox-6">object c</label>
                                    </div>
                                    <div class="check-box">
                                        <input type="checkbox" id="checkbox-7" value="mySql" name="speciality[]">
                                        <label for="checkbox-7">mySql</label>
                                    </div>
                                </span>
                                <input type="hidden" value="<?php echo $list['speciality']; ?>" id="speciality">
                            </div>
                        </div>
                        <div class="row cl">
                            <label class="form-label col-xs-4 col-sm-2">职业：</label>
                            <div class="formControls col-xs-8 col-sm-7">
                                <input style="width: 255px;" class="input-text" type="text" placeholder="职业" value="<?php echo $list['job']; ?>" name="job">
                            </div>
                        </div>
                        <div class="row cl">
                            <label class="form-label col-xs-4 col-sm-2">个性签名：</label>
                            <div class="formControls col-xs-8 col-sm-7">
                                <textarea name="signature" id="wrap" cols="" rows="" class="textarea must" maxlength="200"  placeholder="" datatype="*0-200" dragonfly="true" nullmsg=""><?php echo $list['signature']; ?></textarea>
                            </div>
                        </div>
                        <div class="row cl">
                            <div class="col-xs-8 col-sm-3 col-xs-offset-4 col-sm-offset-2">
                                <button onClick="user_info();" class="btn btn-primary radius buttonleft" type="button" >保存</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="c_right_barbox">
                <div class="c_barbox_top">更换头像</div>
                <div class="" id="crop-avatar">
                    <!-- Current avatar -->
                    <div class="c_left_ori">
                        <div class="avatar-view" title="更改头像">
                            <img src="<?php echo session('blog["head_portrait"]'); ?>" alt="头像">
                        </div>
                        <input type="hidden" value="<?php echo session('blog["head_portrait"]'); ?>" id="old_herad">
                        <input type="hidden" value="<?php echo session('blog["head_portrait"]'); ?>" id="changestart">
                        <input type="hidden" value="" id="changeend">
                        <button type="button" class="btn btn-default radius" id="change_headrer">更改头像</button>
                    </div>
                    <div class="c_left_orishow">
                        <div class="c_left_smallsize">
                            <img class="orishow" src="<?php echo session('blog["head_portrait"]'); ?>">
                            <p>小尺寸头像<br>256*256</p>
                        </div>
                        <div class="c_left_medsize">
                            <img class="orishow" src="<?php echo session('blog["head_portrait"]'); ?>">
                            <p>中尺寸头像<br>256*256</p>
                        </div>
                        <div class="c_left_bigsize">
                            <img class="orishow" src="<?php echo session('blog["head_portrait"]'); ?>">
                            <p>大尺寸头像<br>256*256</p>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary radius" id="heardimg_hold">保存</button>
                    <!-- Cropping modal -->
                    <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form class="avatar-form" action="http://www.zhangheteng.com/blog/public/cropper/index/crop.php" enctype="multipart/form-data" method="post">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal" type="button">&times;</button>
                                        <h4 class="modal-title" id="avatar-modal-label">更改头像</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="avatar-body">

                                            <!-- Upload image and data -->
                                            <div class="avatar-upload">
                                                <input class="avatar-src" name="avatar_src" type="hidden">
                                                <input class="avatar-data" name="avatar_data" type="hidden">
                                                <label for="avatarInput">本地上传</label>
                                                <input class="avatar-input" id="avatarInput" name="avatar_file" type="file">
                                            </div>

                                            <!-- Crop and preview -->
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="avatar-wrapper"></div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="avatar-preview preview-lg"></div>
                                                    <div class="avatar-preview preview-md"></div>
                                                    <div class="avatar-preview preview-sm"></div>
                                                </div>
                                            </div>

                                            <div class="row avatar-btns">
                                                <div class="col-md-9">
                                                    <div class="btn-group" style="margin-left: 120px;">
                                                        <button class="btn btn-primary icon-zoom-in" data-method="zoom" data-option="0.1" type="button" title="放大"></button>
                                                        <button class="btn btn-primary icon-zoom-out" data-method="zoom" data-option="-0.1" type="button" title="缩小"></button>
                                                        <button class="btn btn-primary icon-reply" data-method="rotate" data-option="-45" type="button" title="左旋转45°"></button>
                                                        <button class="btn btn-primary icon-share-alt" data-method="rotate" data-option="45" type="button" title="右旋转45°"></button>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <button class="btn btn-primary btn-block avatar-save" type="submit">确定</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="modal-footer">
                                      <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
                                    </div> -->
                                </form>
                            </div>
                        </div>
                    </div><!-- /.modal -->

                    <!-- Loading state -->
                    <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                </div>

            </div>
            <div class="c_right_barbox">
                <div class="c_barbox_top">修改密码</div>
                <div class="row cl" style="margin-top: 60px;">
                    <label class="form-label col-xs-4 col-sm-2">旧密码：</label>
                    <div class="formControls col-xs-8 col-sm-7">
                        <input style="width: 255px;" id="old_password" class="input-text password" type="password" placeholder="" value="">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">新密码：</label>
                    <div class="formControls col-xs-8 col-sm-7">
                        <input style="width: 255px;" id="new_password" class="input-text password check_psw" type="password" placeholder="" value="">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">确认密码：</label>
                    <div class="formControls col-xs-8 col-sm-7">
                        <input style="width: 255px;" id="true_password" class="input-text password check_psw" type="password" placeholder="" value="">
                    </div>
                </div>
                <div class="row cl">
                    <div class="col-xs-8 col-sm-3 col-xs-offset-4 col-sm-offset-2">
                        <button onClick="check_password()" class="btn btn-primary radius buttonleft" type="button" >保存</button>
                    </div>
                </div>
            </div>
            <div class="c_right_barbox">4</div>
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
<script src="http://www.zhangheteng.com/blog/public/cropper/assets/js/bootstrap.min.js"></script>
<script src="http://www.zhangheteng.com/blog/public/cropper/dist/cropper.min.js"></script>
<script src="http://www.zhangheteng.com/blog/public/cropper/index/js/main.js"></script>

    <script>
        $(document).ready(function(){
//            $(".c_left_top > img").mouseover(function(){
//                layer.tips('下', $(this), {
//                    tips: 2
//                });
//            });
            //信息完整度
            var info_integrity = <?php echo $info_integrity; ?>;
            var window_height = $(window).height()-200;
            if(info_integrity > 4){
                layer.msg('你的资料完整度过低，请先完善信息', {
                    offset: 'auto',
                    icon: 5,
                    shade: [0.4, '#393D49'],
                    anim: 1,
                    shadeClose:true
                });
            }

            var old_heaardImg = $("#old_herad").val();
            //资料设置版块，选中复选框对应的值
            var speciality = $("#speciality").val();
            if(speciality != ''){
                ckeckbox_checked(speciality,"speciality[]");
            }

            //菜单的切换
            $(".confing_content_right > .c_right_barbox").hide();
            $(".confing_content_right > .c_right_barbox").eq(0).show();
            $(".c_left_details .c_left_details_shadow").height($(".c_left_details .c_left_nav").eq(0).outerHeight());
            $(".c_left_details .c_left_nav").on("click",function(){
                var nav_order = $(this).index();        //点击了第几个
                var o_top = $(".c_left_details .c_left_nav").eq(0).outerHeight();       //第一个菜单的高度
                $(".c_left_details .c_left_nav").removeClass("c_left_current");
                $(this).addClass("c_left_current");
                $(".c_left_details .c_left_details_shadow").css("top",(nav_order-1)*o_top);         //改变遮罩层的位置
                $(".confing_content_right > .c_right_barbox").hide();               //右侧内容隐藏
                $(".confing_content_right > .c_right_barbox").eq(nav_order-1).show();       //点击的菜单对应的版块显示
//                if(nav_order == 2){             //点击头像修改
//                    $(".confing_content_right > .c_right_barbox").eq(nav_order-1).html('<iframe scrolling="yes" id="iframes1" frameborder="0" src="http://www.zhangheteng.com/blog/public/cropper/index/index.html"></iframe>');
//                }
            });
            $("#change_headrer").click(function(){
                $(".avatar-view").click();
            });
            $(".avatar-view").click(function(){
                var change_heaardImg = $(".avatar-view > img").attr("src");
                var start = $("#changestart").val();
                var start_ori = start.replace(".png",".original.png");
                var end = $("#changeend").val();
                if(old_heaardImg != start && end != '' && end != start){        //判断更改过几次头像，除去原始头像和最后一次修改的头像，每点击一次都删除上次所上传的图片
                    $.ajax({
                        type: 'POST',
                        data: {start:start,start_ori:start_ori},
                        url: 'http://www.zhangheteng.com/blog/index/userconfing/deleteImg',
                        dataType: 'json',
                    });
                }
                $("#changestart").val(change_heaardImg);
            });

            //跟换头像保存
            $("#heardimg_hold").on("click",function(){
                var change_heaardImg = $(".avatar-view > img").attr("src");
                var old_ori = old_heaardImg.replace(".png",".original.png");
//                var old_img = Array();
//                old_img[0] = old_heaardImg;
//                old_img[1] = old_ori;
//                old_img[2] = change_heaardImg.replace(".png",".original.png");
                if(change_heaardImg != old_heaardImg){
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo Url("edit_heardimg"); ?>',
                        data: {head_portrait:change_heaardImg,old_img:old_heaardImg},
                        dataType: 'json',
                        success: function(data){
                            if(data.status=='1'){
                                layer.msg(data.msg, {icon: 1});
                                setTimeout("location.reload();",3000);
                            }
                            if(data.status=='2'){
                                layer.msg(data.msg, {icon: 0});
                            }
                            if(data.status=='0'){
                                layer.msg(data.msg, {icon: 2});
                            }
                        }
                    })
                }else {
                    layer.msg("尚未编辑新头像！", {icon: 0});
                }
            });
        })

        $("#wrap").Huitextarealength({
            minlength:0,
            maxlength:200
        });

        //用户编辑提交
        function user_info(){
            var form_c = $("#user_selfinfo").serialize();
            $.ajax({
                type: 'POST',
                url: '<?php echo Url("edit_userinfo"); ?>',
                data: form_c,
                dataType: 'json',
                success: function(data){
                    if(data.status=='1'){
                        layer.msg(data.msg, {icon: 1});
                        setTimeout("location.reload();",3000);
                    }
                    if(data.status=='2'){
                        layer.msg(data.msg, {icon: 0});
                    }
                    if(data.status=='0'){
                        layer.msg(data.msg, {icon: 2});
                    }
                }
            })
        }

        //省份联动城市
        function change_city(current){
            var p_id = $(current).val();
            $.ajax({
                type: 'POST',
                url: '<?php echo Url("city"); ?>',
                data:{id:p_id},
                dataType: 'json',
                success: function(data){
                    var city_menu = '<option value="">-城市-</option>';
                    $.each(data,function(k,v){
                        city_menu += '<option value="'+v["id"]+'">'+v["name"]+'</option>';
                    });
                    $("#J_city").html(city_menu);
                    $("#J_district").html('<option value="">-州县-</option>');
                },
            });
        }

        //省份联动地区
        function change_district(current){
            var p_id = $(current).val();
            $.ajax({
                type: 'POST',
                url: '<?php echo Url("city"); ?>',
                data:{id:p_id},
                dataType: 'json',
                success: function(data){
                    var city_menu = '<option value="">-州县-</option>';
                    $.each(data,function(k,v){
                        city_menu += '<option value="'+v["id"]+'">'+v["name"]+'</option>';
                    });
                    $("#J_district").html(city_menu);
                },
            });
        }

        function typecheck(name){       //获取复选框值并输出为数组对象
            var chk_value =[];
            $('input[name="'+name+'"]:checked').each(function(){
                chk_value.push($(this).val());
            });
            return chk_value;
        }

        /***
         * 将字符串转换为数组，并将其值对应的复选框选中
         * str:需要转数组的字符串
         * name:复选框的name
         * */
        function ckeckbox_checked(str,name){
            var type_array = str.split(',');
            var nu = type_array.pop();
            $.each(type_array,function(k,v){
                $('input[name="'+name+'"]').each(function (ko,vo) {
                    if(v == $(vo).val()){
                        $(vo).attr("checked", true);
                    }
                });
            });
        }

        //密码修改验证
//        $("#old_password").on('blur',function(){
//            var that = $(this);
//            var old_password = $(this).val();
//            var name = $("#user_name").text();
//            if( old_password == ''){
//                layer.tips('请先输入旧密码',that,{tips: [2,'#FF5722']});
//            }else {
//                $.ajax({
//                    type: 'POST',
//                    url: '<?php echo Url("check_password"); ?>',
//                    data:{user_name:name,password:old_password,check:0},    //check:0,后台识别参数，仅进行密码验证操作
//                    dataType: 'json',
//                    success: function(data){
//                        if(data.status=='1'){
//                            layer.tips('密码正确',that,{tips: [2,'#09d3c1']});
//                        }
//                        if(data.status=='0'){
//                            layer.tips('旧密码不正确',that,{tips: [2,'#FF5722']});
//                        }
//                    },
//                });
//            }
//        });

        function check_password(){
            var old_password = $("#old_password").val();
            var new_password = $("#new_password").val();
            var true_password = $("#true_password").val();
            if(old_password == ''){
                layer.tips('请先输入旧密码',$("#old_password"),{tips: [2,'#FF5722']});
                return false;
            }else if(new_password == ''){
                layer.tips('请先输入新密码',$("#new_password"),{tips: [2,'#FF5722']});
                return false;
            }else if(true_password == ''){
                layer.tips('请先输入确认密码',$("#true_password"),{tips: [2,'#FF5722']});
                return false;
            }else if(new_password != true_password){
                layer.tips('两次输入的密码不一致',$("#true_password"),{tips: [2,'#FF5722']});
                return false;
            }else if(old_password == true_password){
                layer.tips('新密码不能和旧密码相同',$("#true_password"),{tips: [2,'#FF5722']});
                return false;
            }else if(true_password.length < 6 || true_password.length > 16){
                layer.tips('密码由6-16个字符组成',$("#true_password"),{tips: [2,'#FF5722']});
                return false;
            }else if(true_password.search(/^(?![0-9]+$)(?![a-z]+$)(?![A-Z]+$)(?!([^(0-9a-zA-Z)]|[\(\)])+$)([^(0-9a-zA-Z)]|[\(\)]|[a-z]|[A-Z]|[0-9]){6,}$/) || !/^[a-zA-Z0-9]+$/.test(true_password)){
                layer.tips('密码必须是字母和数字组合',$("#true_password"),{tips: [2,'#FF5722']});
                return false;
            }else {
                var name = $("#user_name").text();
                $.ajax({
                    type: 'POST',
                    url: '<?php echo Url("check_password"); ?>',
                    data:{user_name:name,old_password:old_password,true_password:true_password},
                    dataType: 'json',
                    success: function(data){
                        if(data.status=='1'){
                            layer.msg(data.msg, {icon: 1});
                            setTimeout(function(){
                                exit();
                            },2000);
                        }
                        if(data.status=='0'){
                            layer.tips(data.msg,{icon: 2});
                        }
                        if(data.status=='2'){
                            layer.tips(data.msg,$("#old_password"),{tips: [2,'#FF5722']});
                        }
                    },
                });
            }
        }

        /*退出登陆*/
        function exit(){
            $.ajax({
                type: 'post',
                url: 'http://www.zhangheteng.com/blog/home/index/exit_login',
                dataType: 'json',
                success: function(data){
                    if(data.status=='1'){
                        layer.msg('注销登陆成功');
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
