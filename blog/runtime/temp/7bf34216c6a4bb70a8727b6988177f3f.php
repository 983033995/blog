<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"/data/home/qxu1141810136/htdocs/blog/application/home/view/user/index.html";i:1512965018;s:78:"/data/home/qxu1141810136/htdocs/blog/application/base/view/base/page_base.html";i:1517543935;}*/ ?>
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
    <span class="c-gray en"><i class="Hui-iconfont">&#xe67e;</i></span> 用户管理
    <span class="c-gray en"><i class="Hui-iconfont">&#xe67e;</i></span> 用户信息
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
        <i class="Hui-iconfont">&#xe68f;</i>
    </a>
</nav>

<div class="page-container">
    <div class="mt-20"  style="overflow-x: auto;">
        <table class="table table-border table-bordered table-hover table-bg table-sort" style="max-width: 2000px;">
            <thead>
            <tr class="text-c">
                <th>序号</th>
                <th>用户名</th>
                <th>角色</th>
                <th>等级</th>
                <th>注册时间</th>
                <th>登陆次数</th>
                <th>注册邮箱</th>
                <th>上次登陆时间</th>
                <th>上次登陆IP</th>
                <th>上次登录地址</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            </thead>

            <tbody>
                <?php foreach( $list as $k => $v){ ?>
                <tr>
                    <td class="order_num"></td>
                    <td><?php echo $v['user_name']; ?></td>
                    <td><?php echo $v['pid_name']; ?></td>
                    <td></td>
                    <td><?php echo date('Y-m-d H:i',$v['set_time']); ?></td>
                    <td><?php echo (int)$v['land']; ?></td>
                    <td><?php echo $v['email']; ?></td>
                    <td><?php echo date('Y-m-d H:i',$v['login_time']); ?></td>
                    <td><?php echo $v['ip_next']; ?></td>
                    <td><?php echo GetIpLookup($v['ip_next'])['country']; ?>-<?php echo GetIpLookup($v['ip_next'])['province']; ?>-<?php echo GetIpLookup($v['ip_next'])['city']; ?></td>
                    <td><?php if($v['stat']==0){ echo '<span class="label label-defaunt radius">邮箱未激活</span>';}elseif( $v['is_del'] == 1){ echo '<span class="label label-defaunt radius">已禁用</span>'; }else{ echo '<span class="label label-success radius">启用</span>';} ?></td>
                    <td></td>
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
                {"orderable":false,"aTargets":[0,1,2,3,4,5,6,7,8,9,10,11]}// 制定列不参与排序
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