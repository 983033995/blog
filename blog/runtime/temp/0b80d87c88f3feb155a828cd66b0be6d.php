<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"E:\xampp\htdocs\think_web/application/login\view\index\index.html";i:1509327704;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/login.css">
		<script type="text/javascript" src="__PUBLIC__/lib/jquery/1.9.1/jquery.min.js"></script>
		<title>个人后台登录</title>
		<style>
		</style>
	</head>
	
	<body>
		<div class="login land">
			<div class="header">
				<div class="switch" id="switch">
					<a class="switch_btn_focus" id="switch_qlogin"
					   href="javascript:void(0);" tabindex="7">快速登录</a>
					<a class="switch_btn_focus register" id=""
					   href="javascript:void(0);" tabindex="7" onclick="register()">快速注册</a>
					<div class="switch_bottom" id="switch_bottom"
						 style="position: absolute; width: 64px;"></div>
				</div>
			</div>
			<div class="web_qr_login" id="web_qr_login" style="display: block; height: 270px;">
				<!--登录-->
				<div class="web_login" id="web_login">
					<div class="login-box">
						<div class="login_form">
							<form accept-charset="utf-8" id="login_form" class="loginForm">
								<div class="uinArea" id="uinArea">
									<label class="input-tips" for="u">帐号：</label>
									<div class="inputOuter" id="uArea">
										<input type="text" id="user_name" name="user_name" class="inputstyle" />
									</div>
								</div>
								<div class="pwdArea" id="pwdArea">
									<label class="input-tips" for="p">密码：</label>
									<div class="inputOuter" id="pArea">
										<input type="password" id="pass_word" name="pass_word" class="inputstyle" />
									</div>
								</div>
								<div style="padding-left: 80px; margin-top: 20px;">
									<input onclick="button_submit()" type="button" value="登 录" style="width: 150px;" class="button_blue" />
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--登录end-->
				<!--忘记密码-->
				<div class="web_login" id="forgot">
					<div class="login_form">
						<form accept-charset="utf-8" id="forgot_code" class="loginForm">
							<div class="uinArea" id="forgot_email">
								<p class="e_title">请输入注册时填写的邮箱：</p>
								<div class="forget_con">
									<input type="email" class="" id="e_mail" value="" name="email" placeholder="邮箱">
								</div>
								<div class="self_tip"></div>
							</div>
							<div class="pwdArea" id="" style="margin-top: 20px;">
								<div class="code_input">
									<input type="text" value="" id="code" name="code" placeholder="请输入右侧验证码">
								</div>
								<a href="javascript:;" title="点击刷新验证码"><div class="code_num" onclick="code(this)"></div></a>
							</div>
							<div style="padding-left: 80px; margin-top: 20px;">
								<input onclick="forgotPass()" type="button" value="找回密码" style="width: 150px;" class="button_blue" />
							</div>
						</form>
					</div>
				</div>
				<!--忘记密码-->
			</div>
			<div class="r_foot" id="fogot_btn" onclick="fogot()">忘记密码！</div>
			<div class="r_foot" id="login_btn" onclick="returnLogin()">返回登陆</div>
		</div>

		<!--注册-->
		<div class="login register_box" id="register_box" style="display: none;">
			<div class="header" style="height: 30px; text-align: center; line-height: 30px;">欢迎加入！</div>
			<div class="web_qr_login" id="" style="display: block; height: auto;">
				<div class="web_login" id="">
					<div class="login-box">
						<div class="login_form" style="height: auto;">
							<form accept-charset="utf-8" id="register" class="loginForm">
								<div class="register_i" id="">
									<label class="input-tips" >帐号：</label>
									<div class="inputOuter">
										<input type="text" id="name" name="user_name" class="inputstyle" onblur="proving(this,1)" />
									</div>
									<div class="self_tip">
										<!--<div class="arrow"></div>-->
										<!--<div class="tip_content">账号可用</div>-->
									</div>
								</div>
								<div class="register_i">
									<label class="input-tips" >密码：</label>
									<div class="inputOuter">
										<input type="password" id="pas_w" name="" class="inputstyle" />
									</div>
								</div>
								<div class="register_i">
									<label class="input-tips" >确认密码：</label>
									<div class="inputOuter">
										<input type="password" id="pas_true" name="pass_word" class="inputstyle" />
									</div>
									<div class="self_tip"></div>
								</div>
								<div class="register_i">
									<label class="input-tips" >邮箱：</label>
									<div class="inputOuter">
										<input type="email" id="email" name="email" class="inputstyle" onblur="proving(this,2)"  />
									</div>
									<div class="self_tip"></div>
								</div>

								<div style="padding-left: 80px; margin-top: 20px;">
									<input id="zc" onclick="enroll()" type="button" value="注册" style="width: 150px;" class="button_blue" />
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>
			<div class="r_foot" onclick="login()">已有账号！</div>
		</div>
		<!--注册-->
		<div class="mask"></div>

		<iframe class="bgbody" scrolling="no" sandbox="allow-scripts allow-same-origin" src="__PUBLIC__/42/index2.html"></iframe>

		<script type="text/javascript" src="__PUBLIC__/lib/layer/2.4/layer.js"></script>
		<script>
			var yz_type1 = '<input type="hidden" id="yz_type1" class="yz_type">';
			var yz_type2 = '<input type="hidden" id="yz_type2" class="yz_type">';
			var yz_type3 = '<input type="hidden" id="yz_type3" class="yz_type">';
			//登陆提交
			function button_submit(){
				var user_name = $("#user_name").val();
				var pass_word = $("#pass_word").val();
				var data = $("#login_form").serialize();
				if(user_name == ''){
					layer.msg('请输入账号');
					$("#user_name").focus().css("border-color","red");
					return false;
				}
				if(pass_word == ''){
					layer.msg('请输入密码');
					$("#pass_word").focus().css("border-color","red");
					return false;
				}
				$(".mask").show();
				$.ajax({
					type: 'post',
					url: "<?php echo Url('index'); ?>",
					data: data,
					dataType: 'json',
					success: function(data){
						if(data.status=='1'){
							layer.msg(data.msg);
							setTimeout(function(){
								window.location.href = "/think_web";
							},2000);
						}
						if(data.status=='0'){
							layer.msg(data.msg);
							$(".mask").hide();
						}
					}
				});
			}

			//注册提交
			function enroll(){
				$(".mask").show();
				var data = $("#register").serialize();
				$("#zc").attr('disabled','disabled').addClass("prohibit");
				$.ajax({
					type: 'post',
					url: "<?php echo Url('add'); ?>",
					data: data,
					dataType: 'json',
					success: function(data){
						if(data.status=='1'){
							layer.msg(data.msg);
							setTimeout(function(){
								window.location.href = "/think_web";
							},2000);
						}
						if(data.status=='0'){
							layer.msg(data.msg);
							$(".mask").hide();
						}
					}
				});
			}

			//找回密码
			function forgotPass(){
				var data = $("#forgot_code").serialize();
				var e_mail = $("#e_mail").val();
				var code = $("#code").val();
				if(e_mail == ''){
					$("#e_mail").focus();
					layer.msg('请输入邮箱!');
					return false;
				}else if(!e_mail.match(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/)){
					$("#e_mail").focus();
					layer.msg('请输入正确格式的邮箱!');
					return false;
				}else if(code == ''){
					$("#code").focus();
					layer.msg('请输入验证码!');
					return false;
				}else {
					$(".mask").show();
					$.ajax({
						type: 'post',
						url: "<?php echo Url('forgot'); ?>",
						data: data,
						dataType: 'json',
						success: function(data){
							if(data.status=='1'){
								layer.msg(data.msg);
								setTimeout(function(){
									window.location.href = "/think_web";
								},2000);
							}
							if(data.status=='0'){
								layer.msg(data.msg);
								$(".code_num").html('<?php echo captcha_img(); ?>');
								$(".mask").hide();
							}
						}
					});
				}
			}

			//刷新验证码
			function code(current){
				var html = '<?php echo captcha_img(); ?>';
				$(current).html(html);
			}

			//登陆及注册切换
			function register(){
				$(".land").removeClass("bounceInDown").addClass("hinge");
				setTimeout(function(){
					$(".register_box").show().addClass("bounceInDown");
				},800);
				setTimeout(function(){
					$(".land").hide().removeClass("hinge");
				},1800);
			}
			function login(){
				$(".register_box").removeClass("bounceInDown").addClass("hinge");
				setTimeout(function(){
					$(".land").show().addClass("bounceInDown");
				},800);
				setTimeout(function(){
					$(".register_box").hide().removeClass("hinge");
				},1800);
			}

			//忘记密码及登陆切换
			function fogot(){
				$("#web_login,#fogot_btn").removeClass("bounceInRight").addClass("bounceOutLeft");
				setTimeout(function(){
					$("#switch_qlogin").html("找回密码");
					$("#forgot,#login_btn").show().addClass("bounceInRight");
					$(".code_num").html('<?php echo captcha_img(); ?>');
				},500);
				setTimeout(function(){
					$("#web_login,#fogot_btn").hide().removeClass("bounceOutLeft");
				},500);
			}
			function returnLogin(){
				$("#forgot,#login_btn").removeClass("bounceInRight").addClass("bounceOutLeft");
				setTimeout(function(){
					$("#switch_qlogin").html("快速登陆");
					$("#web_login,#fogot_btn").show().addClass("bounceInRight");
				},500);
				setTimeout(function(){
					$("#forgot,#login_btn").hide().removeClass("bounceOutLeft");
				},500);
			}

			//账号和邮箱是否可用验证
			function proving(current,type){
				var c = $(current).val();
				var html = '<div class="arrow"></div> <div class="tip_content"></div>';
				var tip_box =$(current).parent('div').parent('.register_i').children('.self_tip');
				if(type == 2){			//邮箱账号格式验证
					if(c == ''){
						tip_box.html(html);
						tip_box.children(".tip_content").html('请填写邮箱号！');
						tip_box.children(".arrow,.tip_content").css({backgroundColor:'#FF6666'});
						$("#yz_type2").remove();
						if($('.yz_type').size() < 3){
							$("#zc").attr('disabled','disabled').addClass("prohibit");
						}
						return false;
					}else if(!c.match(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/)) {
						tip_box.html(html);
						tip_box.children(".tip_content").html('邮箱格式不正确！');
						tip_box.children(".arrow,.tip_content").css({backgroundColor:'#FF6666'});
						$("#yz_type2").remove();
						if($('.yz_type').size() < 3){
							$("#zc").attr('disabled','disabled').addClass("prohibit");
						}
						return false;
					}else {
						$.ajax({
							type: 'post',
							url: "<?php echo Url('proving'); ?>",
							data: {type:type,data:c},
							dataType: 'json',
							success: function(data){
								if(data.status=='1'){
									tip_box.html(html);
									tip_box.children(".tip_content").html(data.msg);
									tip_box.children(".arrow,.tip_content").css({backgroundColor:'#66CC99'});
									$("#yz_type2").remove();
									$("#register_box").append(yz_type2);
									if($('.yz_type').size() > 2){
										$("#zc").removeAttr('disabled').removeClass("prohibit");
									}else {
										$("#zc").attr('disabled','disabled').addClass("prohibit");
									};
								}
								if(data.status=='0'){
									tip_box.html(html);
									tip_box.children(".tip_content").html(data.msg);
									tip_box.children(".arrow,.tip_content").css({backgroundColor:'#FF6666'});
									$("#yz_type2").remove();
									if($('.yz_type').size() < 3){
										$("#zc").attr('disabled','disabled').addClass("prohibit");
									}
								}
							}
						});
					}
				}else {
					var username = $.trim(c);
					if(c == ''){			//用户名不能为空
						tip_box.html(html);
						tip_box.children(".tip_content").html('请填写账号！');
						tip_box.children(".arrow,.tip_content").css({backgroundColor:'#FF6666'});
						$("#yz_type1").remove();
						if($('.yz_type').size() < 3){
							$("#zc").attr('disabled','disabled').addClass("prohibit");
						}
						return false;
					}else if(username.length < 3 || username.length > 8 ){
						tip_box.html(html);
						tip_box.children(".tip_content").html('合法长度为3-8个字符！');
						tip_box.children(".arrow,.tip_content").css({backgroundColor:'#FF6666'});
						$("#yz_type1").remove();
						if($('.yz_type').size() < 3){
							$("#zc").attr('disabled','disabled').addClass("prohibit");
						}
						return false;
					}else if(/^\d.*$/.test( username )){		//用户名不能以数字开头
						tip_box.html(html);
						tip_box.children(".tip_content").html('用户名不能以数字开头！');
						tip_box.children(".arrow,.tip_content").css({backgroundColor:'#FF6666'});
						$("#yz_type1").remove();
						if($('.yz_type').size() < 3){
							$("#zc").attr('disabled','disabled').addClass("prohibit");
						}
						return false;
					}else if(!/^[a-zA-Z0-9_\u4e00-\u9fa5]+$/.test( username )){		//只能包含中文、英文字母、数字和下划线
						tip_box.html(html);
						tip_box.children(".tip_content").html('只能包含中文、英文字母、数字和下划线！');
						tip_box.children(".arrow,.tip_content").css({backgroundColor:'#FF6666'});
						$("#yz_type1").remove();
						if($('.yz_type').size() < 3){
							$("#zc").attr('disabled','disabled').addClass("prohibit");
						}
						return false;
					}else if(!(/[0-9a-zA-Z\u4e00-\u9fa5]+$/.test( username ))){
						tip_box.html(html);
						tip_box.children(".tip_content").html('只能英文字母、数字和汉字结尾');
						tip_box.children(".arrow,.tip_content").css({backgroundColor:'#FF6666'});
						$("#yz_type1").remove();
						if($('.yz_type').size() < 3){
							$("#zc").attr('disabled','disabled').addClass("prohibit");
						}
						return false;
					}else {
						$.ajax({
							type: 'post',
							url: "<?php echo Url('proving'); ?>",
							data: {type:type,data:c},
							dataType: 'json',
							success: function(data){
								if(data.status=='1'){
									tip_box.html(html);
									tip_box.children(".tip_content").html(data.msg);
									tip_box.children(".arrow,.tip_content").css({backgroundColor:'#66CC99'});
									$("#yz_type1").remove();
									$("#register_box").append(yz_type1);
									if($('.yz_type').size() > 2){
										$("#zc").removeAttr('disabled').removeClass("prohibit");
									}else {
										$("#zc").attr('disabled','disabled').addClass("prohibit");
									};
								}
								if(data.status=='0'){
									tip_box.html(html);
									tip_box.children(".tip_content").html(data.msg);
									tip_box.children(".arrow,.tip_content").css({backgroundColor:'#FF6666'});
									$("#yz_type1").remove();
									if($('.yz_type').size() < 3){
										$("#zc").attr('disabled','disabled').addClass("prohibit");
									}
								}
							}
						});
					}
				}

			}

			//密码验证
			$("#pas_true").on('blur',function(){
				var pas_true = $(this).val();
				var pass = $.trim(pas_true);
				var pas_w = $("#pas_w").val();
				var html = '<div class="arrow"></div> <div class="tip_content"></div>';
				var tip_box =$(this).parent('div').parent('.register_i').children('.self_tip');
				if(pas_true == pas_w){
					if(pas_true == '' || pas_w == ''){
						tip_box.html(html);
						tip_box.children(".tip_content").html('请填写密码！');
						tip_box.children(".arrow,.tip_content").css({backgroundColor:'#FF6666'});
						$("#yz_type3").remove();
						if($('.yz_type').size() < 3){
							$("#zc").attr('disabled','disabled').addClass("prohibit");
						}
						return false;
					}else if(pass.length < 6 || pass.length > 16){
						tip_box.html(html);
						tip_box.children(".tip_content").html('密码由6-16个字符组成！');
						tip_box.children(".arrow,.tip_content").css({backgroundColor:'#FF6666'});
						$("#yz_type3").remove();
						if($('.yz_type').size() < 3){
							$("#zc").attr('disabled','disabled').addClass("prohibit");
						}
						return false;
					}else if(pass.search(/^(?![0-9]+$)(?![a-z]+$)(?![A-Z]+$)(?!([^(0-9a-zA-Z)]|[\(\)])+$)([^(0-9a-zA-Z)]|[\(\)]|[a-z]|[A-Z]|[0-9]){6,}$/) || !/^[a-zA-Z0-9]+$/.test(pass)){
						tip_box.html(html);
						tip_box.children(".tip_content").html('密码必须是字母和数字组合！');
						tip_box.children(".arrow,.tip_content").css({backgroundColor:'#FF6666'});
						$("#yz_type3").remove();
						if($('.yz_type').size() < 3){
							$("#zc").attr('disabled','disabled').addClass("prohibit");
						}
						return false;
					}else{
						tip_box.html(html);
						tip_box.children(".tip_content").html('密码一致！');
						tip_box.children(".arrow,.tip_content").css({backgroundColor:'#66CC99'});
						$("#yz_type3").remove();
						$("#register_box").append(yz_type3);
						if($('.yz_type').size() > 2){
							$("#zc").removeAttr('disabled');
						};
					}
				}else {
					tip_box.html(html);
					tip_box.children(".tip_content").html('两次密码不一致！');
					tip_box.children(".arrow,.tip_content").css({backgroundColor:'#FF6666'});
					$("#yz_type3").remove();
					if($('.yz_type').size() < 3){
						$("#zc").attr('disabled','disabled').addClass("prohibit");
					}
				}
			})

			$(function(){
				$("#zc").attr('disabled','disabled').addClass("prohibit");
				//确定div的位置
				$(".login").each(function(){
					var h = $(this).height();
					$(this).css({marginTop:-h/2});
				});

				$("input.inputstyle").change(function(){
					$(this).css("border-color","#D7D7D7");
				});
				//登陆和注册的按钮hover动画
				$(".register").css({color:"#ffffff"});
				$(".register").hover(function(){
					$("#switch_bottom").stop().animate({left:"110px"});
					$(this).css({color:"#333"});
					$("#switch_qlogin").css({color:"#ffffff"});
				},function(){
					$("#switch_bottom").stop().animate({left:"0px"});
					$(this).css({color:"#ffffff"});
					$("#switch_qlogin").css({color:"#333"});
				});
			});
		</script>
	</body>
</html>
