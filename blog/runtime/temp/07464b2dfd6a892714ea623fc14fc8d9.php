<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:80:"/data/home/qxu1141810136/htdocs/blog/application/home/view/index/changetime.html";i:1510911992;s:78:"/data/home/qxu1141810136/htdocs/blog/application/base/view/base/page_base.html";i:1517543935;}*/ ?>
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

    
    <nav class="breadcrumb">
        <i class="Hui-iconfont">&#xe67f;</i> 首页
        <span class="c-gray en"><i class="Hui-iconfont">&#xe67e;</i></span> 首页管理
        <span class="c-gray en"><i class="Hui-iconfont">&#xe67e;</i></span> 轮播图管理
        <span class="c-gray en"><i class="Hui-iconfont">&#xe67e;</i></span> 编辑自动切换时间
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
            <i class="Hui-iconfont">&#xe68f;</i>
        </a>
    </nav>
    <div class="page-container">
        <form action="" method="" class="form form-horizontal" id="form-article-add">
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>选择自动切换时间：</label>
                <div class="formControls col-xs-4 col-sm-3">
                    <span class="select-box">
                        <select class="select" name="changeTime">
                            <?php for($i=5; $i<=15;$i++){ ?>
                                <option value="<?php echo $i*1000; ?>" <?php if($changeTime == $i*1000): ?>selected<?php endif; ?>><?php echo $i; ?>s</option>
                           <?php } ?>
                        </select>
                    </span>
                </div>
            </div>
            <input type="hidden" value="<?php echo $changeTime; ?>" id="old">
            <div class="row cl">
                <div class="col-xs-8 col-sm-3 col-xs-offset-4 col-sm-offset-2">
                    <button  onClick="return article_save_submit();" class="btn btn-primary radius" type="button">提交</button>
                    <button onClick="layer_close();" class="btn btn-default radius ml1r" type="button">取消</button>
                </div>
            </div>
        </form>
    </div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="__PUBLIC__/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript" src="//js.users.51.la/19217273.js"></script>

    <script>
        function article_save_submit(){
            var oldval = $("#old").val();
            var newval = $(".select").val();
            if(oldval == newval){
                layer.msg("自动切换时间未发生变化");
                return false;
            }else {
                var str = $("#form-article-add").serialize();
                $.ajax({
                    type: 'POST',
                    url: '<?php echo Url("changetime"); ?>',
                    data:str,
                    dataType: 'json',
                    success: function(data){
                        if(data.status=='1'){
                            layer.msg(data.msg);
                            setTimeout(function(){
                                parent.myDate('1');		//传值到父窗口
                                layer_close();
                            },3000);
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
            }
        }
    </script>

</body>
</html>