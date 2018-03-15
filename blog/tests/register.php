<?php
/**
 * Created by PhpStorm.
 * User: zht
 * Date: 2017/10/22
 * Time: 21:13
 */

include_once("connect.php");//连接数据库

include_once("smtp.class.php");//邮件发送类然后我们要过滤用户提交的信息，并验证用户名是否存在（前端也可以验证）。
$username = stripslashes(trim($_POST['username']));

$query = mysql_query("select id from t_user where username='$username'");

$num = mysql_num_rows($query);

if($num==1){

    echo '用户名已存在，请换个其他的用户名';

    exit;

}