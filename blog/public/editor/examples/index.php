<?php
/**
 * Created by PhpStorm.
 * User: hx
 * Date: 2017/5/25
 * Time: 15:15
 */
if(isset($_POST['submit'])){
    include "phpmailer/class.phpmailer.php";

    $from = '10zhangheteng@sina.com';
    $to = '983033995@qq.com';
    $subject = $_POST['subject'];
    $send_body = $_POST['send_body'];

    $smtp = 'smtp.sina.com';                //使用的smtp服务器
    $port = 465;                              //端口号
    $username = '10zhangheteng@sina.com';  //帐号
    $password = 'abcdef983033995';          //密码

    $mail = new PHPMailer();                  //建立新对象
    $mail->IsSMTP();                          //设定使用SMTP方式寄信
    $mail->SMTPAuth = true;                 //设定SMTP需要验证
    $mail->SMTPSecure = "ssl";              //Gmail的SMTP主机需要使用ssl链接
    $mail->Host = $smtp;                     // SMTP服务器地址
    $mail->Port = $port;                     //端口号
    $mail->CharSet = 'UTF8';                //邮件的编码格式

    $mail->Username = $username;            //邮箱帐号
    $mail->Password = $password;            //邮箱密码
    $mail->From = $from;                    //寄件者信箱
    $mail->FromName = $from;                //寄件者姓名
    $mail->Subject = $subject;              //邮件标题
    $mail->Body = $send_body;               //邮件内容
    $mail->IsHTML(true);                    //邮件内容
    $mail->AddAddress($to);                 //收件者

    if (! $mail->Send()){
        echo '发送错误:'.$mail->ErrorInfo;
    }else{
        echo '<div align="center">邮件发送成功，请注意查收!</div>';
    }
    die();
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title>邮件发送测试功能</title>
    <style>
        form {
            margin: 0;
        }
        textarea {
            display: block;
        }
    </style>
    <link rel="stylesheet" href="../themes/default/default.css" />
    <script charset="utf-8" src="../kindeditor-min.js"></script>
    <script charset="utf-8" src="../js/zh_CN.js"></script>
    <script>
        KindEditor.ready(function(K) {
            K.each({
                'plug-align' : {
                    name : '对齐方式',
                    method : {
                        'justifyleft' : '左对齐',
                        'justifycenter' : '居中对齐',
                        'justifyright' : '右对齐'
                    }
                },
                'plug-order' : {
                    name : '编号',
                    method : {
                        'insertorderedlist' : '数字编号',
                        'insertunorderedlist' : '项目编号'
                    }
                },
                'plug-indent' : {
                    name : '缩进',
                    method : {
                        'indent' : '向右缩进',
                        'outdent' : '向左缩进'
                    }
                }
            },function( pluginName, pluginData ){
                var lang = {};
                lang[pluginName] = pluginData.name;
                KindEditor.lang( lang );
                KindEditor.plugin( pluginName, function(K) {
                    var self = this;
                    self.clickToolbar( pluginName, function() {
                        var menu = self.createMenu({
                            name : pluginName,
                            width : pluginData.width || 100
                        });
                        K.each( pluginData.method, function( i, v ){
                            menu.addItem({
                                title : v,
                                checked : false,
                                iconClass : pluginName+'-'+i,
                                click : function() {
                                    self.exec(i).hideMenu();
                                }
                            });
                        })
                    });
                });
            });
            K.create('#send_body', {
                themeType : 'qq',
                items : [
                    'bold','italic','underline','fontname','fontsize','forecolor','hilitecolor','plug-align','plug-order','plug-indent','link'
                ]
            });
        });
    </script>
</head>
<body>

<form id="form1" name="form1" method="post" action="">
    <table border="0" cellpadding="2" cellspacing="0">
        <tr>
            <td align="right">主题：</td>
            <td><input type="text" name="subject" id="subject" /></td>
        </tr>
        <tr>
            <td align="right">内容:</td>
            <td>
                <!--                <textarea name="send_body" id="send_body" cols="45" rows="5"></textarea>-->
                <textarea  name="send_body" id="send_body" cols="45" rows="5" style="width:700px;height:200px;visibility:hidden;"></textarea>

            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                <input type="submit" name="submit" id="submit" value="提交">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
