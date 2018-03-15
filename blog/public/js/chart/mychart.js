/***
 * 头部导航菜单消息提示
 * 实时查询是否有新消息
 * **/
$(document).ready(function(){
    setInterval(function () {
        var is_dope = $("#dope").length;
        if(is_dope > 0){
            $.ajax({
                type: 'post',
                url: "http://www.zhangheteng.com/blog/index/user/unread",
                dataType: 'json',
                success: function(data){
                    var talk = Object.keys(data['talk']).length;
                    var message = Object.keys(data['message']).length;
                    var total_m = talk + message;
                    if(total_m > 0){
                        $("#tip_bar_num").show().html(total_m);
                    }else {
                        $("#tip_bar_num").hide();
                    }
                    if(data['talk'] != '' && data['message'] == ''){
                        var cont = '';
                        $.each(data['talk'],function(k,v){
                            cont += "<a class='tip_chip' onclick='start_chart(this)' data-receiver='"+v['sender']+"' data-sender='"+v['receiver']+"'>"+v['user_name']+"向你发送了聊天消息！</a>";
                        });
                    }
                    if(data['talk'] == '' && data['message'] != ''){
                        var cont = '';
                        $.each(data['message'],function(k,v){
                            cont += "<a class='tip_chip' data-id='"+v['id']+"' onclick='clear_message(this)'>"+v['content']+"</a>";
                        });
                    }
                    if(data['talk'] != '' && data['message'] != ''){
                        var cont = '';
                        $.each(data['talk'],function(k,v){
                            cont += "<a class='tip_chip' onclick='start_chart(this)' data-receiver='"+v['sender']+"' data-sender='"+v['receiver']+"'>"+v['user_name']+"向你发送了聊天消息！</a>";
                        });
                        $.each(data['message'],function(k,v){
                            cont += "<a class='tip_chip' data-id='"+v['id']+"'  onclick='clear_message(this)'>"+v['content']+"</a>";
                        });
                    }
                    $("input#message_count").val(total_m);
                    $("#message_memory").html(cont);
                }
            });
        }
    },3000);

    /**
     * 鼠标经过头部消息提示时的动作
     * */
    $("#dope").hover(function(){
        var total_m = $("input#message_count").val();
        var message_cont = $("#message_memory").html();
        if(total_m > 0){
            $("#tip_bar_num").remove();
            $("#dope .classify_box").show();
            $("#classify_details").html(message_cont);
        }else {
            $("#dope .classify_box").hide();
        }
    },function(){
        var total_m = $("input#message_count").val();
        var message_cont = $("#message_memory").html();
        var tip_bar = '<div class="tip_bar_num" id="tip_bar_num"></div>';
        if(total_m > 0){
            $("#dope").append(tip_bar);
            $("#tip_bar_num").show().html(total_m);
            $("#dope .classify_box").hide();
        }else {
            $("#dope").append(tip_bar);
            $("#dope .classify_box").hide();
        }
    });

});

/**
 * 点击系统消息时，清除该条消息
 * */
function clear_message(current){
    var id = $(current).attr("data-id");
    $.ajax({
        type: 'post',
        url: "http://www.zhangheteng.com/blog/index/user/clear_message",
        data: {id:id},
        dataType: 'json',
        success: function(data){
            if(data.status=='1'){
                $(current).fadeOut(500);
            }
        }
    });
}

/**
 * 清除所有未读消息
 * */
function ignore(){
    $.ajax({
        type: 'post',
        url: "http://www.zhangheteng.com/blog/index/user/cleardope",
        dataType: 'json',
        success: function(data){
            if(data.status=='1'){
                $("#dope a.tip_chip").fadeOut(500);
            }
        }
    });
}

/***
 *  点击聊天按钮时发起聊天
 * */
function start_chart(current) {
    var receiver = $(current).attr("data-receiver");
    var sender = $(current).attr("data-sender");
    $.ajax({
        type: 'post',
        url: "http://www.zhangheteng.com/blog/index/user/chartuser",
        data: {receiver:receiver,sender:sender},
        dataType: 'json',
        success: function(data){
            chartWindow(data,receiver);
        }
    });
    setInterval(function () {
        if($("#ipad").length > 0) {          //如果聊天窗口未被关闭退出
            if($(".min_tip_box").length > 0) {       //如果窗口最小化
                var send = $(".send_bar").attr("data-sender");
                var receive = $(".send_bar").attr("data-receiver");
                $.ajax({
                    type: 'post',
                    url: "http://www.zhangheteng.com/blog/index/user/timely",
                    data: {receiver:receive,sender:send},
                    dataType: 'json',
                    success: function(data){
                        console.log(data.length);
                        if(data.length > 0){
                            $(".chart_circular").remove();
                            $(".min_tip_box").append('<div class="chart_circular">'+data.length+'</div>');
                        }else{
                            $(".chart_circular").remove();
                        }
                    }
                });
            }else {
                var send = $(".send_bar").attr("data-sender");
                var receive = $(".send_bar").attr("data-receiver");
                $.ajax({
                    type: 'post',
                    url: "http://www.zhangheteng.com/blog/index/user/timely",
                    data: {receiver:receive,sender:send},
                    dataType: 'json',
                    success: function(data){
                        if(data.length > 0){
                            console.log(data);
                            var cur_recevier_head = $(".look_left_current").children(".look_left_headimg").children("img").attr("src");
                            $.each(data,function (k,v) {
                                console.log(v['content']);
                                var other_side ='<div class="dialog_box">' +            //接受者的聊天记录样式框
                                    '<span class="dialog_time">'+getLocalTime(v["set_time"])+'</span>' +
                                    '<div class="other_side">' +
                                    '<div class="head_img"><img src="'+cur_recevier_head+'" /></div>' +
                                    '<div class="dialog_c">' +
                                    '<div class="dialog_arrow"></div>' +
                                    '<div class="dialog_W">'+v["content"]+'</div>' +
                                    '</div></div></div>';
                                $.ajax({
                                    type: 'post',
                                    url: "http://www.zhangheteng.com/blog/index/user/clearstatus",
                                    data: {id:v['id']},
                                    dataType: 'json'
                                });
                                $(".textArea").append(other_side);
                                ipadScrollBar();
                                var he = $(".textArea").height();
                                $(".textArea").css("margin-top",-(he-260));
                            });
                        }else{

                        }
                    }
                });
            }
        }
    },2000)
};

//发起聊天时时时接收聊天信息的方法
function timely_chart() {
    var send = $(".send_bar").attr("data-sender");
    var receive = $(".send_bar").attr("data-receiver");
    $.ajax({
        type: 'post',
        url: "http://www.zhangheteng.com/blog/index/user/timely",
        data: {receiver:receive,sender:send},
        dataType: 'json',
        success: function(data){
            return data;
        }
    });

}


/**
 * 弹出聊天窗口的版块
 * **/
function chartWindow(data,receiver) {
     var receiver_name = data["receiver"]["user_name"];
     var receiver_id = data["receiver"]["id"];
     var receiver_head_portrait = data["receiver"]["head_portrait"];
     var sender_name = data["sender"]["user_name"];
     var sender_id = data["sender"]["id"];
     var sender_head_portrait = data["sender"]["head_portrait"];
    var chartCont = '<div id="ipad"><div class="ipad_close" onclick="chartclose()" title="关闭"><i class="icon Hui-iconfont">&#xe6a6;</i></div><div class="ipad_minimize" onclick="chartminimize()" title="最小化"><i class="icon Hui-iconfont">&#xe6a1;</i></div><div class="ipad-title"><div class="title_r"><div id="look_obj_img"></div><div class="title_r_c">与<span id="look_obj"></span>的聊天</div></div></div>' +
        '<span class="T"></span><span class="R"></span><span class="B"></span><span class="L"></span><span class="TR"></span><span class="BR"></span><span class="BL"></span><span class="LT"></span>' +    //控制拉伸的元素
        '<div class="ipad-cont"><div class="textArea"></div></div>' +           //聊天对话内容区域
        '<div class="ipad-bar"><i class="bar"></i></div>' +                     //聊天区域滚动条
        '<div class="chart_p"></div>' +                                          //左侧聊天对象
        '<div class="dialog_send"><div class="send_words">' +
        '<textArea id="dialog_text"></textArea>' +                              //内容输入框
        '<i id="chart_look" class="icon Hui-iconfont">&#xe68e;</i>' +           //聊天表情图标
        '<div id="dialog_look" class="dialog_look"><div class="look_top"><div class="look_title">常用表情</div><div id="look_close" class="look_close"><i class="icon Hui-iconfont">&#xe6a6;</i></div></div>' +     //聊天表情加载区块
        '<div class="look_icon"><div class="loader loader--circularSquare"></div></div>' +      //等待加载动画
        '</div></div><button title="Enter发送" class="send_bar" data-sender="'+data["sender"]["id"]+'">发送</button></div></div>';
    var left_c1 = '<div class="look_left_row look_left_current" style="margin-top: 34px; border-top: 1px solid #cccccc;" data-sender="'+sender_id+'" data-receiver="'+receiver_id+'">' +
        '<div class="look_left_headimg"><img src="'+receiver_head_portrait+'" /></div>' +
        '<div class="look_left_chartobj">和'+receiver_name+'的聊天</div>' +
        '</div>';
    $("#chart_window").html(chartCont);
    $("#ipad").addClass('chart_animate');
    $('#ipad').ipad({               //调用聊天窗口拖拽插件
        width: 500,
        height: 400,
        limitedWidth: 500,
        limitedHeight: 400,
        dragLimited: true
    });
    ipadScrollBar();
    $(".chart_p").prepend(left_c1);             //将当前聊天对象添加到左侧开始位置
    $("button.send_bar").attr('data-receiver',receiver_id);         //将当前聊天对象的id加到发送按钮上
    $("#look_obj_img").html('<img src="'+receiver_head_portrait+'" />');        //将当前聊天对象的头像添加到聊天窗口头部
    $("#look_obj").html(receiver_name);                     //将当前聊天对象的名字添加到聊天窗口头部
    if(data['receiver_all'] != null || data['receiver_all'] != ''){         //如果有多个用户的聊天信息的话，将其他发生过聊天的对象的信息添加到左侧的聊天对象窗口
       console.log(data['receiver_all']);
        $.each(data['receiver_all'],function(k,v){
            var left_c = '<div class="look_left_row" data-sender="'+sender_id+'" data-receiver="'+v["id"]+'">' +
                '<div class="look_left_headimg"><img src="'+v["head_portrait"]+'" /></div>' +
                '<div class="look_left_chartobj">和'+v["user_name"]+'的聊天</div>' +
                '</div>';
            if(receiver == v['id']){
            }else {
                $(".chart_p").append(left_c);
            }
        });
        var cur_receiver_id = receiver;
        var cur_sender_id = data["sender"]["id"];
        var cur_recevier_head = receiver_head_portrait;
        chartdiago(cur_receiver_id,cur_sender_id,cur_recevier_head);

    }

    //切换聊天对象
    $(".chart_p").append('<div class="look_mask" style="width: 100%; height: 50px; position: absolute; top: 35px; left: 0; z-index: 999;"></div>');
    $(".chart_p .look_left_row").on("click",function () {
        $(".chart_p div.look_left_row").removeClass("look_left_current");
        $(this).addClass("look_left_current");
        var io = $(this).index();
        var top = io*50+35;
        $(".look_mask").css("top",top+"px");
        var cur_receiver_id = $(this).attr("data-receiver");
        var cur_sender_id = $(this).attr("data-sender");
        var cur_recevier_head = $(this).children(".look_left_headimg").children("img").attr("src");
        $(".textArea > div").remove();
        $("button.send_bar").attr("data-receiver",cur_receiver_id);
        chartdiago(cur_receiver_id,cur_sender_id,cur_recevier_head);
    });

    //聊天记录加载方法
    function chartdiago(cur_receiver_id,cur_sender_id,cur_recevier_head) {
        $.ajax({
            type: 'post',
            url: "http://www.zhangheteng.com/blog/index/user/chartrecord",
            data: {receiver:cur_receiver_id,sender:cur_sender_id},
            dataType: 'json',
            success: function(data){
                console.log(data);
                if(data.length > 0){
                    console.log(data);
                    $.each(data,function(ko,vo){
                        var self_message = '<div class="dialog_box">' +         //发送者的聊天记录框
                            '<span class="dialog_time">'+getLocalTime(vo["set_time"])+'</span>' +
                            '<div class="self_side">' +
                            '<div class="head_img"><img src="'+sender_head_portrait+'" /></div>' +
                            '<div class="dialog_c">' +
                            '<div class="dialog_arrow"></div>' +
                            '<div class="dialog_W">'+vo["content"]+'</div>' +
                            '</div></div></div>';
                        var other_side ='<div class="dialog_box">' +            //接受者的聊天记录样式框
                            '<span class="dialog_time">'+getLocalTime(vo["set_time"])+'</span>' +
                            '<div class="other_side">' +
                            '<div class="head_img"><img src="'+cur_recevier_head+'" /></div>' +
                            '<div class="dialog_c">' +
                            '<div class="dialog_arrow"></div>' +
                            '<div class="dialog_W">'+vo["content"]+'</div>' +
                            '</div></div></div>';
                        if(vo["sender"] == cur_sender_id){          //匹配聊天消息来源者
                            $(".textArea").append(self_message);
                        }
                        if(vo["sender"] == cur_receiver_id){
                            $(".textArea").append(other_side);
                        }
                    });
                    $(".textArea").append('<div class="chart_split" style="width: 100%;height: 25px;position: relative;"><div style="width: 90%;height: 1px; background-color: #CCCCCC;position: absolute; top: 12px; left: 5%; z-index: -1;"></div><div style="height: 25px;line-height: 25px;font-size: 10px;color: #3b4249; width: 120px; margin: 0 auto; overflow: hidden; text-align: center; background-color: #ffffff;">以上为历史消息！</div></div>');
                    var cont_h = $(".ipad-cont").height();
                    var textArea_h = $(".textArea").height();
                    var ipad_bar_h = $(".ipad-bar").height();
                    $(".textArea").css("margin-top",-(textArea_h-260));
                    if(textArea_h > cont_h){
                        $(".ipad-bar").show();
                        ipadScrollBar();
                        var bar_h = ipad_bar_h/(textArea_h/cont_h);
                        $(".bar").css("top",ipad_bar_h-bar_h);
                    }
                }else {
                    $(".ipad-bar").hide();
                }
            }
        });
    }

    //var i_height = $("#ipad").height();
    // $(".chart_p").height((1-35/i_height)*100+"%");

    //发送聊天消息执行
    $(".send_bar").click(function () {
        sendMessage(sender_head_portrait);
    });
    $(document).keydown(function(e) {          //按回车键时也触发消息发送
        if(e.ctrlKey && e.which ==13){
            sendMessage(sender_head_portrait);
        }
    })

    // 聊天表情版块
    $("#chart_look").on("click",function(){
        $("#dialog_look").toggle();
        if($("#dialog_look").css("display") == "block"){
            $.ajax({
                type: 'post',
                url: "http://www.zhangheteng.com/blog/index/user/chart",
                // data: {username:username},
                dataType: 'json',
                success: function(data){
                    $("#dialog_look .look_icon .loader").hide();
                    $.each(data,function(k,v){
                        $("#dialog_look .look_icon").append('<img onclick="attrSrc(this)" title="'+v["title"]+'" src="'+v["src"]+'">');
                    });
                }
            });
        }else {
            $("#dialog_look .look_icon img").remove();
            $("#dialog_look .look_icon .loader").show();
        }
    });
    $("#look_close").on("click",function () {
        $("#dialog_look").hide();
        $("#dialog_look .look_icon img").remove();
        $("#dialog_look .look_icon .loader").show();
    });
    $("#dialog_text").on('keyup',function () {
        $("#dialog_look").hide();
        $("#dialog_look .look_icon img").remove();
        $("#dialog_look .look_icon .loader").show();
    });
}

//点击聊天表情时执行的动作
function attrSrc(current){
    var img_name = $(current).attr('title');
    var img_src = $(current).attr('src');
    $("#dialog_text").insertContent('['+img_name+']');
}

//关闭聊天窗口
function chartclose() {
    $("#ipad").remove();
}
//聊天窗口最小化
function chartminimize(){
    var minsize_tip = '<div class="min_tip_box" onclick="chartshow()"><i class="icon Hui-iconfont">&#xe6c5;</i></div>';            //聊天窗口最小化后出现的元素
    $("#ipad").removeClass("chart_animate").addClass("chartout");
    //$("#ipad").animate({"top":"120%","left":"120%","margin-top":0,"margin-left":0},1000);
    $("#ipad").animate({"bottom":"-50%","right":"-200px"},1000);
    setTimeout(function(){
        $("#chart_window").append(minsize_tip);
        $("#ipad").hide();
    },800);
}
//聊天窗口最小化之后重新展开
function chartshow() {
    var i_h = $("#ipad").height();
    var i_w = $("#ipad").width();
    //$("#ipad").show().removeClass("chartout").addClass("chart_animate").animate({"top":"50%","left":"50%","margin-top":-i_h/2,"margin-left":-i_w/2},400);
    $("#ipad").show().removeClass("chartout").addClass("chart_animate").animate({"bottom":"0","right":"0"},400);
    $(".min_tip_box").remove();
}

//发送聊天消息时执行的方法
function sendMessage(img_url) {
    var text_words = $("#dialog_text").val();           //文本框中的内容
    var sender_id = $(".send_bar").attr("data-sender");
    var receiver_id = $(".send_bar").attr("data-receiver");
    if(text_words == '' || text_words.replace(/\ +/g,"") == '' ||text_words.replace(/[\r\n]/g,"") == ''){
        $("#dialog_text").val('').attr("placeholder","请输入聊天内容");
    }else {
        $(".send_bar").attr("disabled","disabled");
        var tt = 0;
        var time_tt = setInterval(function () {
            tt++;
            $(".send_bar").html(tt);
        },1000);
        var reg = /\[(.*?)\]/gi;                            //找到【】中的内容的正则
        var tmp = text_words.match(reg);                    //是否存在【】
        if(tmp){
            $.ajax({
                type: 'post',
                url: "http://www.zhangheteng.com/blog/index/user/chart",
                dataType: 'json',
                success: function(data){
                    var str2=text_words.substring(text_words.indexOf("[")+1,text_words.indexOf("]"));
                    for (var i = 0; i < tmp.length; i++){
                        $.each(data,function(k,v){
                            if (str2 == v['title']){
                                text_words = text_words.replace('['+str2+']','<img src="http://www.zhangheteng.com/forum/Application/Core/Static/images/expression/miniblog/'+v["title"]+'.gif" />');
                                str2=text_words.substring(text_words.indexOf("[")+1,text_words.indexOf("]"));
                            }
                            if (str2 == v['title']){
                                text_words = text_words.replace('['+str2+']','<img src="http://www.zhangheteng.com/forum/Application/Core/Static/images/expression/miniblog/'+v["title"]+'.gif" />');
                                //str2=text_words.substring(text_words.indexOf("[")+1,text_words.indexOf("]"));
                            }
                        });
                     }
                    var self_message = '<div class="dialog_box">' +
                        '<span class="dialog_time">'+currentTime()+'</span>' +
                        '<div class="self_side">' +
                        '<div class="head_img"><img src="'+img_url+'" /></div>' +
                        '<div class="dialog_c">' +
                        '<div class="dialog_arrow"></div>' +
                        '<div class="dialog_W">'+text_words+'</div>' +
                        '</div></div></div>';
                    $.ajax({
                        type: 'post',
                        url: "http://www.zhangheteng.com/blog/index/user/sendmessage",
                        data: {content:text_words,sender:sender_id,receiver:receiver_id},
                        dataType: 'json',
                        success: function(data){
                           if(data.status == 1){
                               $(".textArea").append(self_message);
                               ipadScrollBar();
                               var he = $(".textArea").height();
                               $(".textArea").css("margin-top",-(he-260));
                               $("#dialog_text").val('');
                               clearInterval(time_tt);
                               $(".send_bar").removeAttr("disabled").html("发送");
                           }else {
                               layer.msg(data.msg,{icon: 2});
                               clearInterval(time_tt);
                               $(".send_bar").removeAttr("disabled").html("发送");
                           }
                        }
                    });
                }
            });
        }else {
            var text_words = $("#dialog_text").val();           //文本框中的内容
            var self_message = '<div class="dialog_box">' +
                '<span class="dialog_time">'+currentTime()+'</span>' +
                '<div class="self_side">' +
                '<div class="head_img"><img src="'+img_url+'" /></div>' +
                '<div class="dialog_c">' +
                '<div class="dialog_arrow"></div>' +
                '<div class="dialog_W">'+text_words+'</div>' +
                '</div></div></div>';
            $.ajax({
                type: 'post',
                url: "http://www.zhangheteng.com/blog/index/user/sendmessage",
                data: {content:text_words,sender:sender_id,receiver:receiver_id},
                dataType: 'json',
                success: function(data){
                    if(data.status == 1){
                        $(".textArea").append(self_message);
                        ipadScrollBar();
                        var he = $(".textArea").height();
                        $(".textArea").css("margin-top",-(he-260));
                        $("#dialog_text").val('');
                        clearInterval(time_tt);
                        $(".send_bar").removeAttr("disabled").html("发送");
                    }else {
                        layer.msg(data.msg,{icon: 2});
                        clearInterval(time_tt);
                        $(".send_bar").removeAttr("disabled").html("发送");
                    }
                }
            });
        }
    }
}

/****
 *     获取当前时间
 **/
function currentTime(){         //时间显示
    var d = new Date(),str = '';
    str += d.getFullYear()+'年';
        str  += d.getMonth() + 1+'月';
        str  += d.getDate()+'日&nbsp;';

    if(d.getHours() < 10){
        str  += '0'+d.getHours()+':';
    }else {
        str += d.getHours()+':';
    }
    if(d.getMinutes() < 10){
        str  += '0'+d.getMinutes()+':';
    }else {
        str  += d.getMinutes()+':';
    }
    if(d.getSeconds() < 10){
        str  += '0'+d.getSeconds();
    }else {
        str  += d.getSeconds();
    }
    return str;
}

//文本输入框中在光标位置添加内容的插件
(function($) {
    $.fn.extend({
        insertContent: function(myValue, t) {
            var $t = $(this)[0];
            if (document.selection) { //ie
                this.focus();
                var sel = document.selection.createRange();
                sel.text = myValue;
                this.focus();
                sel.moveStart('character', -l);
                var wee = sel.text.length;
                if (arguments.length == 2) {
                    var l = $t.value.length;
                    sel.moveEnd("character", wee + t);
                    t <= 0 ? sel.moveStart("character", wee - 2 * t - myValue.length) : sel.moveStart("character", wee - t - myValue.length);

                    sel.select();
                }
            } else if ($t.selectionStart || $t.selectionStart == '0') {
                var startPos = $t.selectionStart;
                var endPos = $t.selectionEnd;
                var scrollTop = $t.scrollTop;
                $t.value = $t.value.substring(0, startPos) + myValue + $t.value.substring(endPos, $t.value.length);
                this.focus();
                $t.selectionStart = startPos + myValue.length;
                $t.selectionEnd = startPos + myValue.length;
                $t.scrollTop = scrollTop;
                if (arguments.length == 2) {
                    $t.setSelectionRange(startPos - t, $t.selectionEnd + t);
                    this.focus();
                }
            }
            else {
                this.value += myValue;
                this.focus();
            }
        }
    })
})(jQuery);

/**
 * 和PHP一样的时间戳格式化函数
 * @param {string} format 格式
 * @param {int} timestamp 要格式化的时间 默认为当前时间
 * @return {string}   格式化的时间字符串
 */
function getLocalTime(nS) {
    return new Date(parseInt(nS) * 1000).toLocaleString().replace(/年|月/g, "-").replace(/日/g, " ");
}
