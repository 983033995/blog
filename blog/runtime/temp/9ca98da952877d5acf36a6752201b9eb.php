<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"/data/home/qxu1141810136/htdocs/blog/application/home/view/editor/article_list.html";i:1512716097;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="baidu-site-verification" content="6fnAjpuwhw" />
    <meta name="keywords"content="zhangheteng.com，张鹤腾博客，个人博客，web前端，网页设计" />
    <meta name="description" content="<?php echo $list['wrap']; ?>" />
    <noscript><iframe src=*.html></iframe></noscript>
    <title><?php echo $list['title']; ?></title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/static/h-ui.admin/css/style.css" />
    <link rel="stylesheet" type="text/css" href="http://www.zhangheteng.com/Public/css/animate.css" />
    <script type="text/javascript" src="__PUBLIC__/lib/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/clipboard.min.js"></script>
    <style>
        body{
            background: rgba(255,255,255,0) !important;
        }
        p{
            text-indent: 2em;
        }
        .c_box{
            width: 70%;
            height: auto;
            overflow: hidden;
            background-color: #FFFFFF;
            margin: 40px auto;
            padding: 20px 5%;
        }
        .title{
            width: 100%;
            height: auto;
            min-height: 24px;
            font-family: "Microsoft Yahei", "Hiragino Sans GB", "Helvetica Neue", Helvetica, tahoma, arial, "WenQuanYi Micro Hei", Verdana, sans-serif, "\5B8B\4F53";
            font-size: 22px;
            line-height: 24px;
            font-weight: bold;
            text-align: center;
            margin: 15px 0;
        }
        .details{
            width: 80%;
            height:26px;
            margin: 10px auto;
            color: #999;
            font-size: 12px;
            line-height: 26px;

        }
        .category{
            height: 26px;
            padding: 0 0 30px;
            float: left;
        }
        .time{
            overflow: hidden;
            height: 26px;
            float: right;
        }
        .time span{
            margin: 0 10px;
        }
        table.my_table{
            font-family: "Consolas", "Bitstream Vera Sans Mono", "Courier New", Courier, monospace !important;
            border: 1px solid #DDDDDD;

        }
        table.my_table tr:nth-child(even){
            background-color: #fbfbfb !important;
        }
        table.my_table tr:nth-child(odd){
            background-color: #FFFFFF !important;
        }
        .text_box {
            overflow: hidden;
            width: 100%;
            height: auto;
        }
        nav.breadcrumb{
            position: fixed !important;
            top:0;
            left: 0;
            width: 100% !important;
        }
        a.break{
            margin-right: 50px;
        }
    </style>
</head>

<body>
    <nav class="breadcrumb">
        <i class="Hui-iconfont">&#xe720;</i> 文章
        <span class="c-gray en"><i class="Hui-iconfont">&#xe67e;</i></span> <?php echo $list['category']; ?>
        <span class="c-gray en"><i class="Hui-iconfont">&#xe67e;</i></span> <?php echo $list['title']; ?>
        <a class="btn btn-success radius r break" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
            <i class="Hui-iconfont">&#xe68f;</i>
        </a>
        <a class="btn btn-warning radius r" style="line-height:1.6em;margin-top:3px;margin-right: 20px;" href="javascript:history.go(-1);" title="返回上一页" >
            <i class="Hui-iconfont">&#xe66b;</i>
        </a>
    </nav>

    <div class="c_box">
        <div class="title"><?php echo $list['title']; ?></div>
        <div class="details">
            <div class="category">分类：<?php echo $list['category']; ?></div>
            <div class="time">
                <span><?php echo date('Y-m-d H:i:s',$list['set_time']); ?></span>
                <span><i class="Hui-iconfont">&#xe725;</i><?php echo intval($list['page_view']); ?></span>
                <span>来源：<?php echo $list['user_name']; ?></span>
            </div>
        </div>
        <?php echo $list['content']; ?>
    </div>



    <script type="text/javascript" src="__PUBLIC__/lib/layer/2.4/layer.js"></script>
    <script>
        $(document).ready(function(){
            var tb = '<a class="copy_code btn btn-secondary radius" href="javascript:;" data-clipboard-action="copy" style="font-size: 10px; float: right; padding: 3px 5px;line-height: normal;height: auto;"><i class="icon Hui-iconfont">&#xe6ea;</i>复制</a>' +
                    '<table class="my_table"><tbody></tbody></table>' +
                    '<div class="text_box" style="display: none;"></div>' +
                    '<input type="hidden" class="biaoji" value="0">';
            $("ol").each(function(k,v){
                $(this).prepend(tb);
                $(this).children("a.copy_code").click(function(){
                    var current =$(this);
                    var id = $(this).attr("data-id");
                    var bj = $(this).nextAll("input.biaoji").val();
                    if(bj == 0){
                        $(this).nextAll("input.biaoji").val("1");
                        $(this).next("table").hide();
                        $(this).next("table").next(".text_box").show();
                        var n_h = $(this).next("table").next(".text_box").height();
                        var text_c = $(this).next("table").next(".text_box").text();
                        $(v).height(n_h+50);
                        $(this).html('<i class="icon Hui-iconfont">&#xe6ee;</i>代码');
                        var clipboard = new Clipboard('#'+id);
                        clipboard.on('success', function(e) {
                            console.log(e);
                            if(e.text == ""){
                                current.nextAll("input.biaoji").focus();
                            }else {
                                layer.msg("代码已复制到剪贴板！");
                            }
                        });
                        clipboard.on('error', function(e) {
                            console.log(e);
                            layer.msg("请手动选择复制！");
                        });
                    }else {
                        $(this).nextAll("input.biaoji").val("0");
                        $(this).next("table").next(".text_box").hide();
                        $(this).next("table").show();
                        var n_h = $(this).next("table").height();
                        $(v).height(n_h);
                        $(this).html('<i class="icon Hui-iconfont">&#xe6ea;</i>复制');
                    }
                });
                $(v).children('li').each(function(l,m){
                    var n_m = $(m).text().replace(/[\r\n]/g,"");        //取得li中的文本，并去除多余的回车换行
                    var n_l = n_m.split("<").length;                    //因为这里取出的内容已经被转换了一次，需要把<>转换为&lt;和&gt;否则会被浏览器识别为html内容而被简析
                    var n_l1 = n_m.split(">").length;
                    for (var i=0;i<n_l;i++){
                        var n_m = n_m.replace("<","&lt;");
                    }
                    for (var i=0;i<n_l1;i++){
                        var n_m = n_m.replace(">","&gt;");
                    }
                    var order = l+1;
                    if(order < 10){
                        order = "0"+order;
                    }
                    $(v).children('table').children('tbody').append('<tr style="padding: 5px 0;"><td style="width: 50px; background-color: #eaf6ff; font-size: 12px; border-right: 2px solid #6CE26C; text-align: center; color: #535353;">'+order+'</td><td class="n_con">'+n_m+'</td></tr>');
                    $(v).children('.text_box').append(n_m+"<br>").attr("id","text_box"+k);
                    $(v).children('.copy_code').attr("data-clipboard-target","#text_box"+k).attr("id","copy_code"+k).attr("data-id","copy_code"+k);
                    $(v).children('table').children('tbody').children('tr').children('.n_con').css({"font-size":"14px","text-indent":"1em"});
                    $(this).remove();
                })
                $(this).height($(v).children('table').height()+30);
                $(this).css("padding","10px 0");
            });

            //返回顶部
            $(window).bind('scroll resize',function(){
                if($(window).scrollTop()>200){
                    $("#return_top").remove();
                    $("body").append("<div id='return_top' style='width: 40px; height: 40px; background-color: beige; cursor: pointer; font-size: 16px; position: fixed; z-index: 999; bottom: 100px; left: 85%; line-height: 40px; text-align: center;'><i class='icon Hui-iconfont'>&#xe684;</i></div>")
                }else {
                    $("#return_top").remove();
                }
                $("#return_top").on("click",function(){
                    $('html,body').animate({scrollTop:0},500);
                })
            });

        })
    </script>
</body>
</html>
