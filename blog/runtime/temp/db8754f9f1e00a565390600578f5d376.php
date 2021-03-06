<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"E:\xampp\htdocs\think_web/application/login\view\index\reset.html";i:1509009629;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/login.css">
    <script type="text/javascript" src="__PUBLIC__/lib/jquery/1.9.1/jquery.min.js"></script>
    <title>个人后台登录</title>
    <style>
        .self_tip{
            top: 55px !important;
        }
    </style>
</head>

<body>
<div class="login land">
    <div class="header" style="height: 30px; text-align: center; line-height: 30px;">设置新密码</div>
    <div class="web_qr_login" id="web_qr_login" style="display: block; height: 320px; background-color: rgba(0,0,0,.2);">
        <!--忘记密码-->
        <div class="web_login" >
            <div class="login_form">
                <div class="uinArea" style="height: 40px;">
                    <div class="forget_con">
                        <input type="email" class="" value="用户名：<?php echo $data_list['user_name']; ?>" name="email" placeholder="" disabled style="color: #000;">
                    </div>
                    <div class="self_tip"></div>
                </div>
                <div class="uinArea" style="height: 40px;">
                    <div class="forget_con">
                        <input type="email" class="" value="邮箱：<?php echo $data_list['email']; ?>" name="email" placeholder="" style="color: #000;" disabled>
                    </div>
                    <div class="self_tip"></div>
                </div>

                <form accept-charset="utf-8" id="forgot_code" class="loginForm">
                    <div class="uinArea" id="forgot_email">
                        <p class="e_title" style="color: #fff;;">请确认修改密码后输入新密码：</p>
                        <div class="forget_con">
                            <input type="password" class="" id="pas_w" value="" name="email" placeholder="请输入密码">
                        </div>
                        <div class="self_tip"></div>
                    </div>
                    <div class="uinArea" id="">
                        <p class="e_title" style="height: 30px;"></p>
                        <div class="forget_con">
                            <input type="password" class="" id="pas_true" value="" name="email" placeholder="请再次输入密码" disabled="disabled">
                        </div>
                        <div class="self_tip"></div>
                    </div>
                    <div style="padding-left: 80px; margin-top: 20px;">
                        <input id="zc" onclick="enroll()" type="button" value="提交" style="width: 150px;" class="button_blue" />
                    </div>
                </form>
                <input type="hidden" id="odrem" value="<?php echo $data_list['id']; ?>">
            </div>
        </div>
        <!--忘记密码-->
    </div>
    <div class="r_foot" style="margin-top: 0 !important; cursor: default;">
        <a style="line-height: 30px; font-size: 14px; color: #000000;" href="<?php echo Url('index'); ?>">登陆</a>
    </div>
</div>



<iframe class="bgbody" scrolling="no" sandbox="allow-scripts allow-same-origin" src="__PUBLIC__/42/index2.html"></iframe>

<script type="text/javascript" src="__PUBLIC__/lib/layer/2.4/layer.js"></script>
<script>
    //密码验证
    $("#pas_w").on('blur',function(){
        var pas_true = $(this).val();
        var pass = $.trim(pas_true);
        var id = $("#odrem").val();
        var html = '<div class="arrow"></div> <div class="tip_content"></div>';
        var tip_box =$(this).parent('div').parent('.uinArea').children('.self_tip');
        if(pas_true == ''){
            tip_box.html(html);
            tip_box.children(".tip_content").html('请填写密码！');
            tip_box.children(".arrow,.tip_content").css({backgroundColor:'#FF6666'});
            $("#pas_true").attr('disabled','disabled');
            return false;
        }else if(pass.length < 6 || pass.length > 16){
            tip_box.html(html);
            tip_box.children(".tip_content").html('密码由6-16个字符组成！');
            tip_box.children(".arrow,.tip_content").css({backgroundColor:'#FF6666'});
            $("#pas_true").attr('disabled','disabled');
            return false;
        }else if(pass.search(/^(?![0-9]+$)(?![a-z]+$)(?![A-Z]+$)(?!([^(0-9a-zA-Z)]|[\(\)])+$)([^(0-9a-zA-Z)]|[\(\)]|[a-z]|[A-Z]|[0-9]){6,}$/) || !/^[a-zA-Z0-9]+$/.test(pass)){
            tip_box.html(html);
            tip_box.children(".tip_content").html('密码必须是字母和数字组合！');
            tip_box.children(".arrow,.tip_content").css({backgroundColor:'#FF6666'});
            $("#pas_true").attr('disabled','disabled');
            return false;
        }else{
            $.ajax({
                type: 'post',
                url: "<?php echo Url('reset'); ?>",
                data: {pass_word:pas_true,type:1,id:id},
                dataType: 'json',
                success: function(data){
                    if(data.status=='1'){
                        tip_box.html(html);
                        tip_box.children(".tip_content").html(data.msg);
                        tip_box.children(".arrow,.tip_content").css({backgroundColor:'#FF6666'});
                        $("#pas_true").attr('disabled','disabled');
                    }
                    if(data.status=='0'){
                        tip_box.html(html);
                        tip_box.children(".tip_content").html(data.msg);
                        tip_box.children(".arrow,.tip_content").css({backgroundColor:'#66CC99'});
                        $("#pas_true").removeAttr('disabled');
                    }
                }
            });
        }
    });
    $("#pas_true").on('blur',function(){
        var pas_true = $(this).val();
        var pas_w = $("#pas_w").val();
        var html = '<div class="arrow"></div> <div class="tip_content"></div>';
        var tip_box =$(this).parent('div').parent('.uinArea').children('.self_tip');
        if (pas_true == ''){
            if(pas_w == ''){
                tip_box.html(html);
                tip_box.children(".tip_content").html('请先填写第一次输入的密码！');
                tip_box.children(".arrow,.tip_content").css({backgroundColor:'#FF6666'});
                return false;
            }
            tip_box.html(html);
            tip_box.children(".tip_content").html('请填写密码！');
            tip_box.children(".arrow,.tip_content").css({backgroundColor:'#FF6666'});
            return false;
        }else{
            if(pas_true == pas_w && pas_w != ''){
                tip_box.html(html);
                tip_box.children(".tip_content").html('两次密码一致');
                tip_box.children(".arrow,.tip_content").css({backgroundColor:'#66CC99'});
                $("#zc").removeAttr('disabled').removeClass("prohibit");
                $("#pas_w").on('change',function(){
                    tip_box.html(html);
                    tip_box.children(".tip_content").html('两次密码不一致！');
                    tip_box.children(".arrow,.tip_content").css({backgroundColor:'#FF6666'});
                    $("#zc").attr('disabled','disabled').addClass("prohibit");
                })

            }else {
                tip_box.html(html);
                tip_box.children(".tip_content").html('两次密码不一致！');
                tip_box.children(".arrow,.tip_content").css({backgroundColor:'#FF6666'});
                $("#zc").attr('disabled','disabled').addClass("prohibit");
            }
        }
    });

    //提交
    function enroll(){
        var id = $("#odrem").val();
        var pas_true = $("#pas_true").val();
        $.ajax({
            type: 'post',
            url: "<?php echo Url('reset'); ?>",
            data: {pass_word:pas_true,type:2,id:id},
            dataType: 'json',
            success: function(data){
                if(data.status=='1'){
                    layer.msg(data.msg);
                    setTimeout(function(){
                        window.location.href = "think_web/index.php/login";
                    },2000)
                 }
                if(data.status=='0'){
                    layer.msg(data.msg);
                }
            }
        });
    }

    $(function(){
        $("#zc").attr('disabled','disabled').addClass("prohibit");
        //确定div的位置
        $(".login").each(function(){
            var h = $(this).height();
            $(this).css({marginTop:-h/2});
        });
    });
</script>
</body>
</html>
