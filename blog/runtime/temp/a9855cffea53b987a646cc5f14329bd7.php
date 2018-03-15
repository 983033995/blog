<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"/data/home/qxu1141810136/htdocs/think_web/application/home/view/index/welcome.html";i:1509703326;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
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
<title>我的桌面</title>
	<style>
		html,body{
			background: rgba(0,0,0,0);
			color: #FFFFFF;
		}

	</style>
</head>
<body>
<div class="page-container">
    <p class="f-20 text-success" style="width: 100%; text-align: center;">欢迎<?php echo session('user_name'); ?>使用zht测试系统 <span class="f-14">v3.1</span>后台模版！</p>
	<p>登录次数：<?php echo session('land'); ?> </p>
        <p>上次登录IP：<?php echo session('ip_next'); ?> <br> 上次登录时间：<?php echo session('login_time'); ?></p>
	<table class="table table-border table-bordered table-bg mt-20" style="background: #fff;">
		<thead>
			<tr>
				<th colspan="2" scope="col">服务器信息</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th width="30%">服务器计算机名</th>
				<td><span id="lbServerName"><?php echo $info['ser_name']; ?></span></td>
			</tr>
			<tr>
				<td>服务器IP地址</td>
				<td><?php echo $info['ip']; ?></td>
			</tr>
			<tr>
				<td>服务器域名</td>
				<td><?php echo $info['domain']; ?></td>
			</tr>
			<tr>
				<td>服务器端口 </td>
				<td>80</td>
			</tr>
			<tr>
				<td>运行环境 </td>
				<td><?php echo $info['server']; ?></td>
			</tr>
			<tr>
				<td>服务器操作系统 </td>
				<td><?php echo $info['os']; ?></td>
			</tr>
			<tr>
				<td>PHP运行方式 </td>
				<td><?php echo $info['sapi']; ?></td>
			</tr>
			<tr>
				<td>ThinkPHP版本 </td>
				<td><?php echo $info['version']; ?></td>
			</tr>
			<tr>
				<td>服务器时间 </td>
				<td><?php echo $info['ser_time']; ?></td>
			</tr>
			<tr>
				<td>北京时间</td>
				<td><?php echo $info['bj_time']; ?></td>
			</tr>
			<tr>
				<td>剩余空间</td>
				<td></td>
			</tr>
			<tr>
				<td>当前系统用户名 </td>
				<td><?php echo session('user_name'); ?></td>
			</tr>
		</tbody>
	</table>
</div>
<footer class="footer mt-20">
	<div class="container">
	</div>
</footer>
<script type="text/javascript" src="__PUBLIC__/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="__PUBLIC__/static/h-ui/js/H-ui.min.js"></script> 
<!--此乃百度统计代码，请自行删除-->
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<!--/此乃百度统计代码，请自行删除-->
</body>
</html>