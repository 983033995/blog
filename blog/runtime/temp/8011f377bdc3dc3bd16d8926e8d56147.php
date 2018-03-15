<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"/data/home/qxu1141810136/htdocs/blog/application/home/view/index/propose.html";i:1512716289;s:78:"/data/home/qxu1141810136/htdocs/blog/application/base/view/base/page_base.html";i:1517543935;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="lib/html5shiv.js"></script>
    <script type="text/javascript" src="lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/static/h-ui.admin/css/style.css" />
    <link rel="stylesheet" type="text/css" href="http://www.zhangheteng.com/Public/css/animate.css" />
    <!--[if IE 6]>
    <script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>zht后台测试系统</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
</head>
<body>

    
<style>
    td > img{
        display: block;
        border: none;
        max-height: 150px;
        width: auto;
        max-width: 250px;
    }
    .new_york{
        max-width: 250px;
    }
    .td-manage{
        min-width: 60px;
    }
    table.dataTable thead .sorting_asc{
        background-image: none;
    }
    .d_time{
        max-width: 50px;
    }
    div.none{
        width: 80%;
        height:100px;
        margin: 0px auto;
        text-align: center;
        line-height: 100px;
        font-size: 18px;
    }
    table td{
        text-align: center !important;
    }
    td a.check{
        font-size: 1.5em;
        color: #000;
    }
</style>
<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i> 首页
    <span class="c-gray en"><i class="Hui-iconfont">&#xe67e;</i></span> 首页管理
    <span class="c-gray en"><i class="Hui-iconfont">&#xe67e;</i></span> 个人推荐管理
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
        <i class="Hui-iconfont">&#xe68f;</i>
    </a>
</nav>

<div class="cl pd-5 bg-1 bk-gray mt-20">
        <span class="l">
             <a class="btn btn-primary radius" onclick="editpropose('编辑个人推荐','<?php echo Url("editpropose"); ?>')" href="javascript:;">
                <i class="Hui-iconfont">&#xe600;</i> 编辑个人推荐
            </a>
        </span>
</div>

<div class="page-container">
    <?php if(empty($list)){ ?>
    <div class="none">还未添加过个人推荐！</div>
    <?php }else{ ?>
    <div class="mt-20">
        <table class="table table-border table-bordered table-hover table-bg" >
            <thead>
                <tr class="text-c">
                    <th width="50">序号</th>
                    <th width="150">作者</th>
                    <th width="200">标题</th>
                    <th width="100">类别</th>
                    <th>内容简介</th>
                    <th width="150">发布时间</th>
                    <th width="50">状态</th>
                    <th width="50">查看</th>
                </tr>
            </thead>
            
            <tbody>
            <?php foreach( $list as $k=>$v){ ?>
            <tr>
                <td class="order"><?php echo $k+1; ?></td>
                <td><?php echo $v['user_name']; ?></td>
                <td><?php echo $v['title']; ?></td>
                <td><?php echo $v['category']; ?></td>
                <td><?php echo $v['wrap']; ?></td>
                <td><?php echo date('Y-m-d H:i',$v['set_time']); ?></td>
                <td><?php if($v['show'] == '0'): ?>公开<?php else: ?>仅自己可见<?php endif; ?></td>
                <td><a class="check" href="/blog/home/editor/article_list/sign/<?php echo $v['id']; ?>"><i class="icon Hui-iconfont">&#xe725;</i></a></td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <?php } ?>
</div>


<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="__PUBLIC__/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript" src="//js.users.51.la/19217273.js"></script>

<script type="text/javascript" src="__PUBLIC__/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/lib/laypage/1.2/laypage.js"></script>
<script>
    //修改成功刷新页面
    function myDate(s){
        if(s== '1'){
            location.reload();
        }

    };

    /*编辑个人推荐*/
    function editpropose(title,url){
        var index = layer.open({
            type: 2,
            content: url,
            area: ['100%', '100%'],
            title: title,
            maxmin: true
        });
        layer.full(index);
    }

</script>

</body>
</html>