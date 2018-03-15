<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:81:"/data/home/qxu1141810136/htdocs/blog/application/home/view/index/editpropose.html";i:1512716578;s:78:"/data/home/qxu1141810136/htdocs/blog/application/base/view/base/page_base.html";i:1513130695;}*/ ?>
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

</style>
<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i> 首页
    <span class="c-gray en"><i class="Hui-iconfont">&#xe67e;</i></span> 首页管理
    <span class="c-gray en"><i class="Hui-iconfont">&#xe67e;</i></span> 编辑个人推荐
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
        <i class="Hui-iconfont">&#xe68f;</i>
    </a>
</nav>

<div class="page-container">
    <div class="mt-20">
        <table class="table table-border table-bordered table-hover table-bg table-sort" >
            <thead>
            <tr class="text-c">
                <th width="50">序号</th>
                <th width="80">作者</th>
                <th width="150">标题</th>
                <th width="80">类别</th>
                <th>内容简介</th>
                <th width="120">发布时间</th>
                <th width="70">是否推荐</th>
                <th width="100">操作</th>
            </tr>
            </thead>

            <tbody>
                <?php foreach( $list as $k=>$v){ ?>
                <tr>
                    <td><?php echo $k+1; ?></td>
                    <td><?php echo $v['user_name']; ?></td>
                    <td><?php echo $v['title']; ?></td>
                    <td><?php echo $v['category']; ?></td>
                    <td><?php echo $v['wrap']; ?></td>
                    <td><?php echo date('Y-m-d H:i',$v['set_time']); ?></td>
                    <td class="propose" data-id="<?php echo $v['id']; ?>"><span class="label label-defaunt radius">未推荐</span></td>
                    <td>
                        <span><a style="text-decoration:none" onclick="picture_start(this,'<?php echo $v['id']; ?>')" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a></span>
                        <a style="margin-left: 10px;" class="check" href="/blog/home/editor/article_list/sign/<?php echo $v['id']; ?>"><i class="icon Hui-iconfont">&#xe725;</i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
<input id="count_p" type="hidden" value="">

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="__PUBLIC__/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->


<script type="text/javascript" src="__PUBLIC__/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/lib/laypage/1.2/laypage.js"></script>
<script>
    $(function(){
        $("td.order_num").each(function(k,v){
            $(this).html(k+1);
        });
        $('.table-sort').dataTable({
            "aaSorting": [[ 0, "asc" ]],//默认第几个排序
            "bStateSave": true,//状态保存
            "aoColumnDefs": [
                //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
                {"orderable":false,"aTargets":[0,1,2,3,4,5,6,7]}// 制定列不参与排序
            ]
        });

    });

    var propose = <?php echo $propose; ?>;
    $("td.propose").each(function(o,p){
        var current = $(this);
        var id = $(this).attr("data-id");
        $.each(propose,function(k,v){
            $("#count_p").val(k+1);
            if(id == v['index_id']){
                current.html('<span class="label label-success radius">已推荐</span>');
                current.next('td').find("span").html('<a style="text-decoration:none" onClick="picture_stop(this,'+v['id']+')" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
            }
        });
    });

    /*轮播-禁用*/
    function picture_stop(obj,id){
        layer.confirm('确认要取消推荐吗？',function(index){
            $.ajax({
                type: 'POST',
                url: '<?php echo Url("abrogate"); ?>',
                data:{id:id},
                dataType: 'json',
                success: function(data){
                    if(data.status=='1'){
                        layer.msg('已取消推荐!',{icon: 5,time:2000});
                        setTimeout(function(){
                            location.reload();
                        },2000);
                    }
                    if(data.status=='0'){
                        layer.msg(data.msg);
                    }
                },
                error: function(data){
                    layer.msg('操作失败！');
                }
            });
        });
    }

    /*轮播-启用*/
    function picture_start(obj,id){
        var count = $("#count_p").val();
        if(count > 2){
            layer.confirm('<span style="color: #aa1111;">推荐文章已有3条，请先下架后再推荐！</span>');
        }else {
            layer.confirm('确认要推荐吗？',function(index){
                $.ajax({
                    type: 'POST',
                    url: '<?php echo Url("groom"); ?>',
                    data:{id:id},
                    dataType: 'json',
                    success: function(data){
                        if(data.status=='1'){
                            layer.msg('已推荐!',{icon: 6,time:2000});
                            setTimeout(function(){
                                location.reload();
                            },2000);
                        }
                        if(data.status=='0'){
                            layer.msg(data.msg);
                        }
                    },
                    error: function(data){
                        layer.msg('操作失败！');
                    }
                });
            });
        }
    }

    //修改轮播
    function banner_edit(title,url){
        var index = layer.open({
            type: 2,
            content: url,
            area: ['100%', '100%'],
            title: title,
            maxmin: true
        });
        layer.full(index);
    }
    /*删除轮播*/
    function banner_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                type: 'POST',
                url: '<?php echo Url("bannerdel"); ?>',
                data: {id:id},
                dataType: 'json',
                success: function(data){
                    if(data.status=='1'){
                        layer.msg('已删除!',{icon:1,time:2000});
                        setTimeout(function(){
                            location.reload();
                        },2000);
                    }
                    if(data.status=='0'){
                        layer.msg(data.msg);
                    }
                },
                error:function(data) {
                    layer.msg('操作失败！');
                }
            });
        });
    }

</script>

</body>
</html>