//设备判断
function browserRedirect() {
    var sUserAgent = navigator.userAgent.toLowerCase();
    var bIsIpad = sUserAgent.match(/ipad/i) == "ipad";
    var bIsIphoneOs = sUserAgent.match(/iphone os/i) == "iphone os";
    var bIsMidp = sUserAgent.match(/midp/i) == "midp";
    var bIsUc7 = sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4";
    var bIsUc = sUserAgent.match(/ucweb/i) == "ucweb";
    var bIsAndroid = sUserAgent.match(/android/i) == "android";
    var bIsCE = sUserAgent.match(/windows ce/i) == "windows ce";
    var bIsWM = sUserAgent.match(/windows mobile/i) == "windows mobile";
    if (bIsIpad || bIsIphoneOs || bIsMidp || bIsUc7 || bIsUc || bIsAndroid || bIsCE || bIsWM) {
        /**
         * 绑定手机端touch事件
         */
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        }
        var myTouch = util.toucher(document.getElementById('focus_box'));
        myTouch.on('swipeLeft', function(e) {
            $('#next').click();
        }).on('swipeRight', function(e) {
            $('#prev').click();
        });
        $("div.arrow").hide();
    } else {

    }
}

$(document).ready(function(){
    /*焦点图*/
    var changeTime = $("#focus_box").attr("data-changetime");
    focus(changeTime);
    window.addEventListener('resize',function(){
        resize_w();
    },false);
    /*焦点图*/

    /**
     * 鼠标经过的边框动画
     */
    borderAnimate();
    borderAnimate1();
    /*设备判断*/
    browserRedirect();

    //头部固定方式
    var top_height = $("#propose").offset().top;
    console.log(top_height);
    $(window).bind('scroll resize',function(){
        if($(window).scrollTop() > top_height){
            $("nav.breadcrumb").addClass("tip_top_a");
        }else {
            $("nav.breadcrumb").removeClass("tip_top_a");
        }
    });

});

function borderAnimate(){
    $('.border_animate').each(function(){
        $(this).hover(function(){
            var lanren_width = $(this).width();
            var lanren_height = $(this).height();
            $(this).find('.border-left,.border-right').stop().animate({height:lanren_height+'px'},400);
            $(this).find('.border-top,.border-bottom').stop().animate({width:lanren_width+'px'},400);
        },function(){
            var lanren_width = $(this).width();
            var lanren_height = $(this).height();
            $(this).find('.border-left,.border-right').stop().animate({height:'0'},400);
            $(this).find('.border-top,.border-bottom').stop().animate({width:'0'},400);
        });
    });
}
function borderAnimate1(){
    $('.border_animate1').each(function(){
        $(this).hover(function(){
            var E_time = $(this).attr('data-time');
            var lanren_width = $(this).width();
            var lanren_height = $(this).height();
            $(this).find('.border-top').stop().animate({width:lanren_width+'px'},E_time*0.25);
            $(this).find('.border-right').stop().delay(E_time*0.25).animate({height:lanren_height+'px'},E_time*0.25);
            $(this).find('.border-bottom').stop().delay(E_time*0.5).animate({width:lanren_width+'px'},E_time*0.25);
            $(this).find('.border-left').stop().delay(E_time*0.75).animate({height:lanren_height+'px'},E_time*0.25);
        },function(){
            var E_time = $(this).attr('data-time');
            var lanren_width = $(this).width();
            var lanren_height = $(this).height();
            $(this).find('.border-left').stop().animate({height:0+'px'},E_time*0.25);
            $(this).find('.border-bottom').stop().delay(E_time*0.25).animate({width:0+'px'},E_time*0.25);
            $(this).find('.border-right').stop().delay(E_time*0.5).animate({height:0+'px'},E_time*0.25);
            $(this).find('.border-top').stop().delay(E_time*0.75).animate({width:0+'px'},E_time*0.25);
        });
    });
}
/**
 * 清除动画和添加新动画的方法
 * @param 所要操作的元素的选择器 selector
 * @param 动画效果的class名 animateName
 * @param 动画延迟时间 delay
 * @param 动画运行时间 duration
 */
function testAnim(selector,animateName,delay,duration) {
    selector.removeClass(animateName + ' animated').css({
        "animation-delay": delay,
        "-moz-animation-delay": delay,
        "-webkit-animation-delay": delay,
        "animation-duration": duration,
        "-webkit-animation-duration": duration,
        "-moz-animation-duration": duration
    }).addClass(animateName + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
        $(this).removeClass(animateName + ' animated');
    });
};
/**
 * 给轮播各元素赋予宽度
 */
function resize_w(){
    var mywidth=$(window).width();//获取单前屏幕的宽度
    var n=$(".focus .focus_content").length;  //获取焦点图的个数
    $(".focus_box").width(mywidth);
    $(".focus").width(mywidth*n);
    $(".focus .focus_content").width(mywidth);
    $(".focus_nav a,span").width(mywidth/n);
}
/**
 * 轮播执行方法
 * @param 轮播自动切换时间 changeTime
 */
function focus(changeTime){
    var n=$(".focus .focus_content").length;  //获取焦点图的个数
    for(var i=0;i<n;i++){		//向页面中添加下方的导航条
        var myhtml='<a class="navbar"></a>';
        $(".focus_nav").append(myhtml);
    }
    resize_w();
    var f_i = $(".focus_introduce").eq(0);
    testAnim(f_i,f_i.attr('data-animate'),f_i.attr('data-delay'),f_i.attr('data-duration'));
    var f_s = $(".focus_supply").eq(0);
    testAnim(f_s,f_s.attr('data-animate'),f_s.attr('data-delay'),f_s.attr('data-duration'));
    var imgCount=0;
    $(".focus_content").each(function() {
        imgCount++;
    });
    init_foucusimg(imgCount,changeTime);
};
/**
 * 轮播具体执行效果方法
 * @param 轮播图个数 imgCount
 * @param 轮播自动切换时间 changeTime
 */
function init_foucusimg(imgCount,changeTime){
    //自动播放
    var n=0;
    function handle(m,l){
        $(".focus_nav span").animate({left:l},500);
        $(".focus").animate({left:m},500);
        var focus_introduce = $(".focus > div.focus_content").eq(n).children('div.w_content').children('div.focus_introduce');
        var focus_supply = $(".focus > div.focus_content").eq(n).children('div.w_content').children('div.focus_supply');
        testAnim(focus_introduce,focus_introduce.attr('data-animate'),focus_introduce.attr('data-delay'),focus_introduce.attr('data-duration'));
        testAnim(focus_supply,focus_supply.attr('data-animate'),focus_supply.attr('data-delay'),focus_supply.attr('data-duration'));
    }
    function changeimg(){
        if(n>(imgCount-2)){
            n=0;
        }else{
            n=n+1
        }
        var l=$(".navbar").eq(n).position().left;
        var m=-$(".focus > div.focus_content").eq(n).position().left;
        handle(m,l);
    };
    var time=setInterval(changeimg,changeTime);

    //点击下方导航切换
    $(".navbar").click(function(event){
        clearInterval(time);	//先清除上一轮的时间
        time=setInterval(changeimg,changeTime);	//开始新一轮的焦点切换时间
        event.preventDefault();		//取消锚击链接的默认事件
        n=$(".navbar").index(this);		//获取到点击的下方按钮是第几个
        var l=$(".navbar").eq(n).position().left;	//所点击的按钮的left的值
        var m=-$(".focus > div.focus_content").eq(n).position().left;	//所点击的按钮对应的焦点的left的值
        handle(m,l);
    })

    //点击上一个
    $("#prev").click(function(){
        clearInterval(time);	//先清除上一轮的时间
        time=setInterval(changeimg,changeTime);	//开始新一轮的焦点切换时间
        if(n<(-1*(imgCount-2))){
            n=0;
        }else{
            n=n-1;
        }
        var l=$(".navbar").eq(n).position().left;	//所点击的按钮的left的值
        var m=-$(".focus > div.focus_content").eq(n).position().left;	//所点击的按钮对应的焦点的left的值
        handle(m,l);
    })

    //点击下一个
    $("#next").click(function(){
        clearInterval(time);	//先清除上一轮的时间
        time=setInterval(changeimg,changeTime);	//开始新一轮的焦点切换时间
        if(n>(imgCount-2)){
            n=0;
        }else{
            n=n+1;
        }
        var l=$(".navbar").eq(n).position().left;	//所点击的按钮的left的值
        var m=-$(".focus > div.focus_content").eq(n).position().left;	//所点击的按钮对应的焦点的left的值
        handle(m,l);
    })
};

