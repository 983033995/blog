<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"E:\xampp\htdocs\think_web/application/home\view\editor\index.html";i:1509527262;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title>KindEditor PHP</title>
    <script type="text/javascript" src="__PUBLIC__/lib/jquery/1.9.1/jquery.min.js"></script>
    <link rel="stylesheet" href="__PUBLIC__/editor/themes/default/default.css" />
    <link rel="stylesheet" href="__PUBLIC__/editor/plugins/code/prettify.css" />
    <script charset="utf-8" src="__PUBLIC__/editor/kindeditor.js"></script>
    <script charset="utf-8" src="__PUBLIC__/editor/lang/zh_CN.js"></script>
    <script charset="utf-8" src="__PUBLIC__/editor/plugins/code/prettify.js"></script>
    <script>
        KindEditor.ready(function(K) {
            var editor1 = K.create('textarea[name="content"]', {
                cssPath : '__PUBLIC__/editor/plugins/code/prettify.css',
                uploadJson : '__PUBLIC__/editor/php/upload_json.php',
                fileManagerJson : '__PUBLIC__/editor/php/file_manager_json.php',
                newlineTag: 'p',
                autoHeightMode : true,
                allowFileManager : true,
                afterCreate : function() {
                    var self = this;
                    this.loadPlugin('autoheight');
                    K.ctrl(document, 13, function() {
                        self.sync();
                        K('form[name=example]')[0].submit();
                    });
                    K.ctrl(self.edit.doc, 13, function() {
                        self.sync();
                        K('form[name=example]')[0].submit();
                    });
                }
            });
            prettyPrint();
        });
    </script>
    <style>
        .ke-icon-about{
            display: none;
        }
        .ke-icon-about
    </style>
</head>
<body style="background-color: #FFFFFF;">

<form name="example" method="post" action="<?php echo Url('index'); ?>">
    <?php if(!empty($editor)){ echo $editor; } ?>
    <textarea name="content" style="width:700px;height:200px;visibility:hidden;"><?php if(!empty($editor)){ echo $editor; } ?></textarea>
    <br />
    <input type="submit" value="提交内容" /> (提交快捷键: Ctrl + Enter)
</form>

<button type="button" id="preview">预览</button>
<script>
    $(function(){
        $("#preview").click(function(){
            $(".ke-icon-preview").click();
        });

    })
    $(document).keydown(function(event){

        if(event.keyCode == 27){
            $("span.ke-icon-fullscreen").click();
        }
    });
</script>
</body>

</html>

