<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"/data/home/qxu1141810136/htdocs/think_web/application/home/view/editor/article.html";i:1510021785;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="Bookmark" href="__PUBLIC__/favicon.ico" >
    <link rel="Shortcut Icon" href="__PUBLIC__/favicon.ico" />
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
    <title>我的文章</title>
    <style>
        div.none{
            width: 80%;
            height:100px;
            margin: 0px auto;
            text-align: center;
            line-height: 100px;
            font-size: 18px;
        }
        .article_list{
            width: 80%;
            height: auto;
            overflow: hidden;
            margin: 20px auto;
        }
    </style>
</head>

<body style="background-color: #FFFFFF;">
    <nav class="breadcrumb">
        <i class="Hui-iconfont">&#xe67f;</i> 首页
        <span class="c-gray en">&gt;</span> 文章管理
        <span class="c-gray en">&gt;</span> 我的文章
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
            <i class="Hui-iconfont">&#xe68f;</i>
        </a>
    </nav>

    <div class="article_list">
        <?php if(empty($content)){ ?>
            <div class="none">暂无任何文章！</div>
        <?php }else{ foreach( $content as $v ){ ?>
                <a href="/think_web/home/editor/article_list/id/<?php echo $v['id']; ?>">
                    <div class="content_list">
                        <div class="promulgator">作者：<?php echo $v['user_name']; ?></div>
                        <div class="title">标题：<?php echo $v['title']; ?></div>
                        <div class="wrap">标题：<?php echo $v['wrap']; ?></div>
                        <div class="time">时间：<?php echo date("Y-m-d H:i",$v['set_time']); ?></div>
                    </div>
                </a>
            <?php } } ?>
    </div>
</body>

</html>

