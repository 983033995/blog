<?php
/**
 * Created by PhpStorm.
 * User: hx
 * Date: 2017/5/25
 * Time: 15:15
 */
if(isset($_POST['submit'])){
    include "phpmailer/class.phpmailer.php";

    $from = $_POST['from'];
    $to = $_POST['to'];
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
<form id="form1" name="form1" method="post" action="">
    <table border="0" cellpadding="2" cellspacing="0">
        <tr>
            <td align="right">收件人：</td>
            <td><input type="text" name="to" id="to" /></td>
        </tr>
        <tr>
            <td align="right">主题：</td>
            <td><input type="text" name="subject" id="subject" /></td>
        </tr>
        <tr>
            <td align="right">内容:</td>
            <td>
                <textarea name="send_body" id="send_body" cols="45" rows="5"></textarea>
            </td>
        </tr>
        <tr>
            <td align="right">来自：</td>
            <td>
                <input type="text" name="from" id="from">
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
