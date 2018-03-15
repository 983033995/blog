<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"E:\xampp\htdocs\think_web/application/login\view\index\register.html";i:1508726881;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script type="text/javascript" src="__PUBLIC__/lib/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
<form id="login_form" enctype="multipart/form-data">
    邮箱：<input  type="email" id="mail" name="email"/>
    <input class="button" type="button" value="发送" onclick="button_submit()" style="margin: 0 auto;display: block;"/>
</form>
<script type="text/javascript" src="__PUBLIC__/lib/layer/2.4/layer.js"></script>
<script>
    function button_submit(){
        var data = $("#login_form").serialize();

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
                    },3000);
                }
                if(data.status=='0'){
                    layer.msg(data.msg);
                }
            }
        });
    }

</script>

</body>
</html>