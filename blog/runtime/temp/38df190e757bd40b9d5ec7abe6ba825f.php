<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:76:"/data/home/qxu1141810136/htdocs/blog/application/home/view/index/banner.html";i:1511853920;s:78:"/data/home/qxu1141810136/htdocs/blog/application/base/view/base/page_base.html";i:1517543935;}*/ ?>
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
</style>
    <nav class="breadcrumb">
        <i class="Hui-iconfont">&#xe67f;</i> 首页
        <span class="c-gray en"><i class="Hui-iconfont">&#xe67e;</i></span> 首页管理
        <span class="c-gray en"><i class="Hui-iconfont">&#xe67e;</i></span> 轮播图管理
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
            <i class="Hui-iconfont">&#xe68f;</i>
        </a>
    </nav>
    <div class="cl pd-5 bg-1 bk-gray mt-20">
        <span class="l">
             <a class="btn btn-primary radius" onclick="addbanner('添加轮播','<?php echo Url("addbanner"); ?>')" href="javascript:;">
                <i class="Hui-iconfont">&#xe600;</i> 添加轮播
            </a>
            <a class="btn btn-primary radius" onclick="changeTime('修改自动切换时间')" href="javascript:;">
                <i class="Hui-iconfont">&#xe6df;</i> 自动切换时间
            </a>
        </span>
    </div>
    <div class="page-container">
        <div class="mt-20"  style="overflow-x: auto;">
            <table class="table table-border table-bordered table-hover table-bg table-sort" style="max-width: 2000px;">
                <thead>
                <tr class="text-c">
                    <th>序号</th>
                    <th>背景图</th>
                    <th>内容图</th>
                    <th>内容图入场动画</th>
                    <th class="d_time">内容图执行动画时间</th>
                    <th class="d_time">内容图延迟动画时间</th>
                    <th>内容简介</th>
                    <th>内容简介入场动画</th>
                    <th class="d_time">内容简介执行动画时间</th>
                    <th class="d_time">内容简介延迟动画时间</th>
                    <th>排版</th>
                    <th>排序</th>
                    <th>链接地址</th>
                    <th>是否启用</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach( $list as $v){ ?>
                    <tr>
                        <td class="order_num"></td>
                        <td><img src="<?php echo $v['bg_img']; ?>" /></td>
                        <td><img src="<?php echo $v['present_img']; ?>" /></td>
                        <td><?php echo $v['present_img_animate']; ?></td>
                        <td class="d_time"><?php echo $v['present_img_duration']; ?></td>
                        <td class="d_time"><?php echo $v['present_img_dealy']; ?></td>
                        <td class="new_york"><?php echo $v['new_york']; ?></td>
                        <td><?php echo $v['new_york_animate']; ?></td>
                        <td class="d_time"><?php echo $v['new_york_duration']; ?></td>
                        <td class="d_time"><?php echo $v['new_york_dealy']; ?></td>
                        <td><?php if($v['set_type'] == '0'): ?>左文右图<?php else: ?>左图右文<?php endif; ?></td>
                        <td><?php echo $v['sort']; ?></td>
                        <td><?php echo $v['link']; ?></td>
                        <td class="td-status"><?php if($v['is_finish'] == '1'): ?><span class="label label-success radius">已启用</span><?php else: ?><span class="label label-defaunt radius">已禁用</span><?php endif; ?></td>
                        <td class="td-manage" data-id="<?php echo $v['id']; ?>">
                            <?php if($v['is_finish'] == '1'): ?><a style="text-decoration:none" onClick="picture_stop(this,'10001')" href="javascript:;" title="禁用"><i class="Hui-iconfont">&#xe6de;</i></a><?php else: ?><a style="text-decoration:none" onClick="picture_start(this,id)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe603;</i></a><?php endif; ?>
                            <a style="text-decoration:none" class="ml-5" onClick="banner_edit('轮播修改','/blog/home/index/editbanner/id/<?php echo $v['id']; ?>')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
                            <a style="text-decoration:none" class="ml-5" onClick="banner_del(this,'<?php echo $v['id']; ?>')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
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
        $(function(){
            $("td.order_num").each(function(k,v){
                $(this).html(k+1);
            });
            $('.table-sort').dataTable({
                "aaSorting": [[ 0, "asc" ]],//默认第几个排序
                "bStateSave": true,//状态保存
                "aoColumnDefs": [
                    //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
                    {"orderable":false,"aTargets":[0,1,2,3,4,5,6,7,8,9,10,11,12,13,14]}// 制定列不参与排序
                ]
            });

        });

        /*新增轮播*/
        function addbanner(title,url){
            var index = layer.open({
                type: 2,
                content: url,
                area: ['100%', '100%'],
                title: title,
                maxmin: true
            });
            layer.full(index);
        }

        function changeTime(title){
            layer.open({
                type: 2,
                title: title,
                area: ['500px', '300px'],
                fixed: false, //不固定
                maxmin: true,
                content: '<?php echo Url('changetime'); ?>'
            });
        }
        //修改成功刷新页面
        function myDate(s){
            if(s== '1'){
                location.reload();
            }

        };

        /*轮播-禁用*/
        function picture_stop(obj,id){
            layer.confirm('确认要禁用吗？',function(index){
                var id = $(obj).parents("tr").find(".td-manage").attr("data-id");
                $.ajax({
                    type: 'POST',
                    url: '<?php echo Url("state"); ?>',
                    data:{id:id,is_finish:0},
                    dataType: 'json',
                    success: function(data){
                        if(data.status=='1'){
                            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="picture_start(this,id)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe603;</i></a>');
                            $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已禁用</span>');
                            $(obj).remove();
                            layer.msg('已禁用!',{icon: 5,time:2000});
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
            layer.confirm('确认要启用吗？',function(index){
                var id = $(obj).parents("tr").find(".td-manage").attr("data-id");
                $.ajax({
                    type: 'POST',
                    url: '<?php echo Url("state"); ?>',
                    data:{id:id,is_finish:1},
                    dataType: 'json',
                    success: function(data){
                        if(data.status=='1'){
                            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="picture_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
                            $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
                            $(obj).remove();
                            layer.msg('已启用!',{icon: 6,time:2000});
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