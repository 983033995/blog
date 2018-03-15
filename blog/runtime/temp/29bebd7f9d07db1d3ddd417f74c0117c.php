<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:80:"/data/home/qxu1141810136/htdocs/blog/application/home/view/editor/publisher.html";i:1520316509;s:78:"/data/home/qxu1141810136/htdocs/blog/application/base/view/base/page_base.html";i:1517543935;}*/ ?>
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
    body{
        /*background: rgba(0,0,0,0);*/
    }
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
        margin: 0px auto;
        padding: 30px 0;
        background-color: #FFFFFF;
    }
    .content_list{
        margin: 25px auto;
        cursor: default;
        position: relative;
        transition: all 0.3s linear;
        -webkit-transition: all 0.3s linear;
        -moz-transition: all 0.3s linear;
        -ms-transition: all 0.3s linear;
    }
    .content_list:hover{
        transform: translate(-10px,-7px);
        -webkit-transform: translate(-7px,-10px);
        -moz-transform: translate(-7px,-10px);
        -ms-transform: translate(-7px,-10px);
        transition: all 0.3s linear;
        -webkit-transition: all 0.3s linear;
        -moz-transition: all 0.3s linear;
        -ms-transition: all 0.3s linear;
    }
    .content_list > div{
        padding: 3px 30px;
    }
    .content_list > div.title{
        background-color: rgba(246, 245, 243, 0.45);
        height: 30px;
        line-height: 30px;
        border-bottom: solid 1px #eee;
        color: #428BD1;
    }
    .content_list > div.title a{
        color: #428BD1;
        text-decoration: none;
    }
    .content_list > .order_num{
        padding: 0;
        width: 25px;
        height: 25px;
        border: 1px solid #eee;
        background-color: rgba(246, 245, 243, 1);
        line-height: 25px;
        text-align: center;
        border-radius: 25px;
        position: absolute;
        top: -10px;
        left: -13px;
        color: #428BD1;
    }
    .content_list > .promulgator{
        padding: 10px 30px;
        font-size: 12px;
        color: #999999;
    }
    .content_list > .promulgator > span{
        padding: 0 10px;
        border-bottom: 1px dashed #eeeeee;
    }
    .content_list > .wrap{
        font-size: 14px;
        color: #777;
        line-height: 24px;
        font-family: "Microsoft Yahei","Helvetica Neue",Helvetica,Arial,sans-serif;
        text-indent: 2em;
    }
    ul.pagination{
        width: auto;
        height: 30px;
        overflow: hidden;
        float: right;
    }
    ul.pagination  > li{
        width: 28px;
        height: 28px;
        float: left;
        line-height: 28px;
        text-align: center;
        border: 1px solid #000;
        margin: 0 10px;
    }
    ul.pagination  > li.active{
        background-color: #00a0e9;
        border: 1px solid #00a0e9 !important;
        color: #FFFFFF;
    }
    ul.pagination  > li > a{
        display: block;
        text-decoration: none;
        width: 100%;
        height: 100%;
    }
    .operate{
        height:30px;
        margin-top: 10px;
        overflow: hidden;
        background-color: rgba(246, 245, 243, 0.45);
        line-height: 30px;
        border-top: solid 1px #eee;
        color: #428BD1;
    }
    .read_sta{
        width: auto;
        overflow: hidden;
        float: left;
    }
    .operate_b{
        width: auto;
        overflow: hidden;
        float: right;
    }
</style>

<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i> 首页
    <span class="c-gray en">&gt;</span> 文章管理
    <span class="c-gray en">&gt;</span> 我的文章
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
        <i class="Hui-iconfont">&#xe68f;</i>
    </a>
</nav>

<div class="article_list">
    <?php if($content['total'] == 0){ ?>
    <div class="none">暂无任何文章！</div>
    <?php }else{ foreach( $content['data'] as $k => $v ){ ?>
    <div class="bk-gray box-shadow radius content_list">
        <div class="order_num box-shadow"><?php if(!empty($page_num)){echo ($page_num-1)*$content['per_page']+$k+1;}else{ echo $k+1;} ?></div>
        <div class="title"><a href="/blog/home/editor/article_list/sign/<?php echo $v['id']; ?>"><?php echo $v['title']; ?></a></div>
        <div class="promulgator">
            <span><i class="Hui-iconfont">&#xe62c;</i>&nbsp;<?php echo $v['user_name']; ?></span>
            <span><i class="Hui-iconfont">&#xe681;</i>&nbsp;<?php echo $v['category']; ?></span>
            <span><i class="Hui-iconfont">&#xe606;</i>&nbsp;<?php echo date("Y-m-d H:i",$v['set_time']); ?></span>
            <span><i class="Hui-iconfont">&#xe725;</i>&nbsp;<?php echo intval($v['page_view']); ?></span>
        </div>
        <div class="wrap"><?php echo $v['wrap']; ?></div>
        <div class="operate">
            <div class="read_sta">状态：<?php switch($v['status']): case "0": ?><span class="btn-warning radius">待审核</span><?php break; case "2": ?><span class="btn-danger radius">被退回</span><?php break; endswitch; ?></div>
            <div class="operate_b">
                <a href="/blog/home/editor/article_show/sign/<?php echo $v['id']; ?>"><i class="Hui-iconfont">&#xe725;</i>&nbsp;查看</a>
                <?php if(session('blog["pid"]') == '0'){ ?>
                <a href="javascript:;" data-id="<?php echo $v['id']; ?>" data-user="<?php echo $v['user_id']; ?>" data-operate="1" data-title="<?php echo $v['title']; ?>" onclick="overt(this)">
                    <i class="Hui-iconfont">&#xe6dc;</i>&nbsp;发布
                </a>
                <?php if($v['status'] == 0){ ?>
                <a href="javascript:;" data-id="<?php echo $v['id']; ?>" data-user="<?php echo $v['user_id']; ?>" data-operate="3" data-title="<?php echo $v['title']; ?>" onclick="overt(this)">
                    <i class="Hui-iconfont">&#xe6dc;</i>&nbsp;驳回
                </a>
                <?php } } ?>
            </div>
        </div>


    </div>
    <?php } } ?>
    <?php echo $list->render(); ?>
</div>


<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="__PUBLIC__/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript" src="//js.users.51.la/19217273.js"></script>

<script>
    function overt(current){
        var id = $(current).attr('data-id');
        var operate = $(current).attr('data-operate');
        var recevie_id = $(current).attr('data-user');
        var title = $(current).attr('data-title');
        if(operate == 1){
            var tip_w = '确定发布该文章吗？';
        }else{
            var tip_w = '确定驳回该文章吗？';
        }
        layer.confirm(tip_w, {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.ajax({
                type: 'POST',
                url: '<?php echo Url("release"); ?>',
                data: {id:id,operate:operate,recevie_id:recevie_id,title:title},
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
        }, function(index){
            layer.close(index);
        });
    }
</script>

</body>
</html>