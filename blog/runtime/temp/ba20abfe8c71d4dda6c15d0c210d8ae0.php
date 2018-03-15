<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"E:\xampp\htdocs\think_web/application/login\view\editor\index.html";i:1509435710;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title>KindEditor PHP</title>
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
                allowFileManager : true,
                afterCreate : function() {
                    var self = this;
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
</head>
<body>

<form name="example" method="post" action="<?php echo Url('index'); ?>">
    <textarea name="content" style="width:700px;height:200px;visibility:hidden;"></textarea>
    <br />
    <input type="submit" value="提交内容" /> (提交快捷键: Ctrl + Enter)
</form>
</body>
</html>

