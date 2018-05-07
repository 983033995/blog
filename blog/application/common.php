<?php


/**
 * 邮件发送函数
 */
function sendMail($to, $title, $content) {

    Vendor('PHPMailer.PHPMailerAutoload');
    $mail = new PHPMailer(); //实例化
    $mail->IsSMTP(); // 启用SMTP
    $mail->Host=Config('MAIL_HOST'); //smtp服务器的名称（这里以QQ邮箱为例）
    $mail->SMTPAuth = Config('MAIL_SMTPAUTH'); //启用smtp认证
    $mail->Username = Config('MAIL_USERNAME'); //你的邮箱名
    $mail->Password = Config('MAIL_PASSWORD') ; //邮箱密码
    $mail->From = Config('MAIL_FROM'); //发件人地址（也就是你的邮箱地址）
    $mail->FromName = Config('MAIL_FROMNAME'); //发件人姓名
    $mail->AddAddress($to,"尊敬的客户");
    $mail->WordWrap = 50; //设置每行字符长度
    $mail->IsHTML(Config('MAIL_ISHTML')); // 是否HTML格式邮件
    $mail->CharSet=Config('MAIL_CHARSET'); //设置邮件编码
    $mail->Subject =$title; //邮件主题
    $mail->Body = $content; //邮件内容
    $mail->AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端"; //邮件正文不支持HTML的备用显示
    return($mail->Send());
}
/**
 * 邮件发送方法
 */
function sendEmailTo($to,$username,$emailtitle,$content){
    $emaildate=date('Y-m-d H:i:s',time());
    $emailcontent='';
    $emailcontent.='<html><head></head><body><div style="font-family:黑体;min-height:300px; background:#57bfaa;min-width:300px;max-width: 1000px;border: 0px solid #ccc; margin: auto;">';
    $emailcontent.='<div style="width: 100%;font-size:20px;text-align: center;background: #4484c5; height: 50px;color: #FFF;line-height: 50px">邮件提醒</div>';
    $emailcontent.='<div style="padding: 20px;color: #fff">';
    $emailcontent.='<h3>尊敬的【'.$username.'】你好：</h3>';
    $emailcontent.='<p style="line-height: 30px">'.$content.'</p>';
    $emailcontent.='<p style="line-height: 30px">如果您并未发送过此请求，则可能是别人填写信息时误输入了您的电子邮件地址，您无需进一步采取应对措施。<br>此邮件为系统自动发送，请勿直接回复！<br><br>请注意：该验证码将在10分钟后过期。</p>';
    $emailcontent.='<p style="text-align: right;">zht测试系统 v3.1</p>';
    $emailcontent.='<p style="text-align: right;">'.$emaildate.'</p>';
    $emailcontent.='</div>';
    $emailcontent.='</div></body></html>';
    if(SendMail($to,$emailtitle,$emailcontent)){
        return true;
    }else{
        return false;
    }
}

//生成随机字符串
function randStr($length=4,$type="1"){
    $array = array(
        '1' => '0123456789',
        '2' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
        '3' => '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',
    );
    $string = $array[$type];
    $count = strlen($string)-1;
    $rand = '';
    for ($i = 0; $i < $length; $i++) {
        $rand .= $string[mt_rand(0, $count)];
    }
    return $rand;
}

//加密方法
function passport_encrypt($txt, $key) {

    // 使用随机数发生器产生 0~32000 的值并 MD5()
    srand((double)microtime() * 1000000);
    $encrypt_key = md5(rand(0, 32000));

    // 变量初始化
    $ctr = 0;
    $tmp = '';

    // for 循环，$i 为从 0 开始，到小于 $txt 字串长度的整数
    for($i = 0; $i < strlen($txt); $i++) {
        // 如果 $ctr = $encrypt_key 的长度，则 $ctr 清零
        $ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr;
        // $tmp 字串在末尾增加两位，其第一位内容为 $encrypt_key 的第 $ctr 位，
        // 第二位内容为 $txt 的第 $i 位与 $encrypt_key 的 $ctr 位取异或。然后 $ctr = $ctr + 1
        $tmp .= $encrypt_key[$ctr].($txt[$i] ^ $encrypt_key[$ctr++]);
    }

    // 返回结果，结果为 passport_key() 函数返回值的 base64 编码结果
    return base64_encode(passport_key($tmp, $key));

}

function passport_decrypt($txt, $key) {

    // $txt 的结果为加密后的字串经过 base64 解码，然后与私有密匙一起，
    // 经过 passport_key() 函数处理后的返回值
    $txt = passport_key(base64_decode($txt), $key);

    // 变量初始化
    $tmp = '';

    // for 循环，$i 为从 0 开始，到小于 $txt 字串长度的整数
    for ($i = 0; $i < strlen($txt); $i++) {
        // $tmp 字串在末尾增加一位，其内容为 $txt 的第 $i 位，
        // 与 $txt 的第 $i + 1 位取异或。然后 $i = $i + 1
        $tmp .= $txt[$i] ^ $txt[++$i];
    }

    // 返回 $tmp 的值作为结果
    return $tmp;

}

function passport_key($txt, $encrypt_key) {

    // 将 $encrypt_key 赋为 $encrypt_key 经 md5() 后的值
    $encrypt_key = md5($encrypt_key);

    // 变量初始化
    $ctr = 0;
    $tmp = '';

    // for 循环，$i 为从 0 开始，到小于 $txt 字串长度的整数
    for($i = 0; $i < strlen($txt); $i++) {
        // 如果 $ctr = $encrypt_key 的长度，则 $ctr 清零
        $ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr;
        // $tmp 字串在末尾增加一位，其内容为 $txt 的第 $i 位，
        // 与 $encrypt_key 的第 $ctr + 1 位取异或。然后 $ctr = $ctr + 1
        $tmp .= $txt[$i] ^ $encrypt_key[$ctr++];
    }

    // 返回 $tmp 的值作为结果
    return $tmp;

}

function passport_encode($array) {

    // 数组变量初始化
    $arrayenc = array();

    // 遍历数组 $array，其中 $key 为当前元素的下标，$val 为其对应的值
    foreach($array as $key => $val) {
        // $arrayenc 数组增加一个元素，其内容为 "$key=经过 urlencode() 后的 $val 值"
        $arrayenc[] = $key.'='.urlencode($val);
    }

    // 返回以 "&" 连接的 $arrayenc 的值(implode)，例如 $arrayenc = array('aa', 'bb', 'cc', 'dd')，
    // 则 implode('&', $arrayenc) 后的结果为 ”aa&bb&cc&dd"
    return implode('&', $arrayenc);

}


/**
 * 简单对称加密算法之加密
 * @param String $string 需要加密的字串
 * @param String $skey 加密EKY
 * @return String
 */
function encode($string = '', $skey = 'cxphp') {
    $strArr = str_split(base64_encode($string));
    $strCount = count($strArr);
    foreach (str_split($skey) as $key => $value)
        $key < $strCount && $strArr[$key].=$value;
    return str_replace(array('=', '+', '/'), array('O0O0O', 'o000o', 'oo00o'), join('', $strArr));
}
/**
 * 简单对称加密算法之解密
 * @param String $string 需要解密的字串
 * @param String $skey 解密KEY
 * @return String
 */
function decode($string = '', $skey = 'cxphp') {
    $strArr = str_split(str_replace(array('O0O0O', 'o000o', 'oo00o'), array('=', '+', '/'), $string), 2);
    $strCount = count($strArr);
    foreach (str_split($skey) as $key => $value)
        $key <= $strCount  && isset($strArr[$key]) && $strArr[$key][1] === $value && $strArr[$key] = $strArr[$key][0];
    return base64_decode(join('', $strArr));
}

function yz(){
    if (empty(session('blog["user_name"]'))) {
        header("Location:" . Url('\login'), false);
        exit;
    }
}

/**
 * 删除目录及目录下所有文件或删除指定文件
 * @param str $path   待删除目录路径
 * @param int $delDir 是否删除目录，1或true删除目录，0或false则只删除文件保留目录（包含子目录）
 * @return bool 返回删除状态
 */
function delDirAndFile($path, $delDir = FALSE) {
    $handle = opendir($path);
    if ($handle) {
        while (false !== ( $item = readdir($handle) )) {
            dump(1);
            if ($item != "." && $item != "..")
                is_dir("$path/$item") ? delDirAndFile("$path/$item", $delDir) : unlink("$path/$item");
        }
        closedir($handle);
        if ($delDir)
            return rmdir($path);
    }else {
        dump(2);
        if (file_exists($path)) {
            return unlink($path);
        } else {
            return FALSE;
        }
    }
}


/**
 * @return 根据ip地址获取所在城市
 */
function GetIp(){
    $realip = '';
    $unknown = 'unknown';
    if (isset($_SERVER)){
        if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], $unknown)){
            $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            foreach($arr as $ip){
                $ip = trim($ip);
                if ($ip != 'unknown'){
                    $realip = $ip;
                    break;
                }
            }
        }else if(isset($_SERVER['HTTP_CLIENT_IP']) && !empty($_SERVER['HTTP_CLIENT_IP']) && strcasecmp($_SERVER['HTTP_CLIENT_IP'], $unknown)){
            $realip = $_SERVER['HTTP_CLIENT_IP'];
        }else if(isset($_SERVER['REMOTE_ADDR']) && !empty($_SERVER['REMOTE_ADDR']) && strcasecmp($_SERVER['REMOTE_ADDR'], $unknown)){
            $realip = $_SERVER['REMOTE_ADDR'];
        }else{
            $realip = $unknown;
        }
    }else{
        if(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), $unknown)){
            $realip = getenv("HTTP_X_FORWARDED_FOR");
        }else if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), $unknown)){
            $realip = getenv("HTTP_CLIENT_IP");
        }else if(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), $unknown)){
            $realip = getenv("REMOTE_ADDR");
        }else{
            $realip = $unknown;
        }
    }
    $realip = preg_match("/[\d\.]{7,15}/", $realip, $matches) ? $matches[0] : $unknown;
    return $realip;
}

function GetIpLookup($ip = ''){
    if(empty($ip)){
        $ip = GetIp();
    }
    $res = @file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=' . $ip);
    if(empty($res)){ return false; }
    $jsonMatches = array();
    preg_match('#\{.+?\}#', $res, $jsonMatches);
    if(!isset($jsonMatches[0])){ return false; }
    $json = json_decode($jsonMatches[0], true);
    if(isset($json['ret']) && $json['ret'] == 1){
        $json['ip'] = $ip;
        unset($json['ret']);
    }else{
        return false;
    }
    return $json;
}


/**
*计算两个时间戳之间的时间差
 **/
function time2Units ($old_time)
{
    $past = $old_time;
    $now  = time();
    $time = $now - $past;
    $year   = floor($time / 60 / 60 / 24 / 365);
    $time  -= $year * 60 * 60 * 24 * 365;
    $month  = floor($time / 60 / 60 / 24 / 30);
    $time  -= $month * 60 * 60 * 24 * 30;
    $week   = floor($time / 60 / 60 / 24 / 7);
    $time  -= $week * 60 * 60 * 24 * 7;
    $day    = floor($time / 60 / 60 / 24);
    $time  -= $day * 60 * 60 * 24;
    $hour   = floor($time / 60 / 60);
    $time  -= $hour * 60 * 60;
    $minute = floor($time / 60);
    $time  -= $minute * 60;
    $second = $time;
    $elapse = '';

    $unitArr = array('年'  =>'year', '个月'=>'month',  '周'=>'week', '天'=>'day',
        '小时'=>'hour', '分钟'=>'minute', '秒'=>'second'
    );

    foreach ( $unitArr as $cn => $u )
    {
        if ( $$u > 0 )
        {
            $elapse = $$u . $cn;
            break;
        }
    }

    return $elapse;
}

/***
 * 获取用户粉丝数
 */
function fans_num(){
    $id = Session::get('blog["id"]');
    $fans = \think\Db::name('follow')->where('floow_who',$id)->count();             //该用户的粉丝数
    return $fans;
}

/***
 * 获取用户关注数
 */
function follow_num(){
    $id = Session::get('blog["id"]');
    $follow_num = \think\Db::name('follow')->where('who_floow',$id)->count();             //该用户的粉丝数
    return $follow_num;
}

/*
 * PHP二维数组根据某个元素去重
 * $arr->传入数组   $key->判断的key值
 * **/
function array_unset_tt($arr,$key){
    //建立一个目标数组
    $res = array();
    foreach ($arr as $value) {
        //查看有没有重复项

        if(isset($res[$value[$key]])){
            //有：销毁

            unset($value[$key]);

        }
        else{

            $res[$value[$key]] = $value;
        }
    }
    return $res;
}

/*
 * 验证用户信息的完整都度
 * $id : 用户的id
 * 用户信息权重总和：10
 * **/
function info_integrity($id){
    $res =  \think\Db::name('user')->where('id',$id)->find();
    $weight = 0;
    if($res['sex'] == '' || $res['sex'] == null){
        $weight = $weight+1;
    }
    if($res['age'] == '' || $res['age'] == null){
        $weight = $weight+1;
    }
    if($res['province'] == '' || $res['province'] == null){
        $weight = $weight+1;
    }
    if($res['city'] == '' || $res['city'] == null){
        $weight = $weight+1;
    }
    if($res['area'] == '' || $res['area'] == null){
        $weight = $weight+1;
    }
    if($res['signature'] == '' || $res['signature'] == null){
        $weight = $weight+1;
    }
    if($res['birthday'] == '' || $res['birthday'] == null){
        $weight = $weight+1;
    }
    if($res['qq_num'] == '' || $res['qq_num'] == null){
        $weight = $weight+1;
    }
    if($res['speciality'] == '' || $res['speciality'] == null){
        $weight = $weight+1;
    }
    if($res['job'] == '' || $res['job'] == null){
        $weight = $weight+1;
    }
    if($res['job_age'] == '' || $res['job_age'] == null){
        $weight = $weight+1;
    }
    return $weight;         //返回的值为信息为空的个数
}
