$(document).ready(function(){
    var self_name = $("#self_name").text();         //自己的账号名字
    var load_animate = "<div id='load_anim' class='loader loader--circularSquare'></div>";      //加载的动画

    //点击左侧导航时的简单效果
    $(".u_cont_left > div").on("click",function(){
        $(".u_cont_left > div").removeClass("u_cont_current");
        $(this).addClass("u_cont_current");
    });
    $(".u_user_info").click(function(){
        $(".u_right_user").show();
        $(".u_right_load_box").hide();
    });
    /**
     * 加载个人文章的方法
     * **/
    $(".u_user_editor").click(function() {
        var username = $(this).attr("data-id");
        $(".u_right_user").hide();
        $(".u_right_load_box").show().html(load_animate);
        $.ajax({
            type: 'post',
            url: "http://www.zhangheteng.com/blog/index/user/self_article",
            data: {username:username},
            dataType: 'json',
            success: function(data){
                if(data['total'] == 0){
                    $(".u_right_load_box").html('<div class="none">暂无任何文章！</div>');
                }else {
                    $("#load_anim").remove();
                    var hea = '<div class="u_user_title"><div><span style="color: #f37b1d; padding: 0 5px;">'+username+'</span>的文章</div></div>';
                    $(".u_right_load_box").append(hea);
                    $.each(data['list'],function(k,v){
                        var cont = '<a class="panel_a" href="http://www.zhangheteng.com/blog/home/editor/article_show/sign/'+v["id"]+'"><div class="panel panel-secondary mt-20"><div class="panel-header">'+ v["title"]+'</div><div class="promulgator"><span><i class="Hui-iconfont">&#xe681;</i>&nbsp;'+v["category"]+'</span><span><i class="Hui-iconfont">&#xe606;</i>&nbsp;'+getDate(v["set_time"])+'</span><span><i class="Hui-iconfont">&#xe725;</i>&nbsp;'+~~v["page_view"]+'</span></div><div class="panel-body">'+ v["wrap"]+'</div></div></a>';
                        $(".u_right_load_box").append(cont);
                    });
                    if(data['total'] > 20){
                        $(".u_right_load_box").append('<div class="read_all"><a target="_blank" href="http://www.zhangheteng.com/blog/index/user/article/design/'+username+'">查看全部>></a></div>');
                    }
                }
            }
        });
    });

    //加载关注的用户
    $(".u_user_follow").click(function() {
        var id = $(this).attr("data-id");           //自己的id
        $(".u_right_user").hide();
        $(".u_right_load_box").show().html(load_animate);
        $.ajax({
            type: 'post',
            url: "http://www.zhangheteng.com/blog/index/user/concern",
            data: {id:id,dif:1},
            dataType: 'json',
            success: function(data){
                console.log(data);
                if(data == ""){
                    $(".u_right_load_box").html('<div class="none">暂无任何关注！</div>');
                }else {
                    $("#load_anim").remove();
                    var hea = '<div class="u_user_title"><div><span style="color: #f37b1d; padding: 0 5px;">'+self_name+'</span>关注的用户</div></div>';
                    $(".u_right_load_box").append(hea);
                    $.each(data,function(k,v){
                        console.log(v);
                        var follow_cont = '<div class="follow_cont_box">' +
                            '<div class="f_heard_img"><img src="'+v["head_portrait"]+'"></div>' +
                            '<div class="f_detailed">' +
                            '<div>'+v['user_name']+'</div>' +
                            '<div>'+v["signature"]+'</div>' +
                            '<div><span class="num"><i class="icon Hui-iconfont">&#xe70c;</i>&nbsp;'+v["editor_num"]+'&nbsp;文章</span><span class="num"><i style="color: #888;" class="fa fa-users" aria-hidden="true"></i>&nbsp;'+v["fans"]+'&nbsp;粉丝</span><span class="num"><i class="fa fa-heart-o" aria-hidden="true"></i>&nbsp;'+v["follow"]+'&nbsp;关注</span></div>' +
                            '</div>' +
                            '<a class="f_he_home" href="http://www.zhangheteng.com/blog/index/user/index/id/'+v["user_id"]+'">他/她的主页</a></div>';
                        $(".u_right_load_box").append(follow_cont);
                    });
                }
            }
        });
    })

    //加载粉丝
    $(".u_user_fans").click(function() {
        var id = $(this).attr("data-id");           //自己的id
        $(".u_right_user").hide();
        $(".u_right_load_box").show().html(load_animate);
        $.ajax({
            type: 'post',
            url: "http://www.zhangheteng.com/blog/index/user/concern",
            data: {id:id,dif:2},
            dataType: 'json',
            success: function(data){
                console.log(data);
                if(data == ""){
                    $(".u_right_load_box").html('<div class="none">暂无任何关注！</div>');
                }else {
                    $("#load_anim").remove();
                    var hea = '<div class="u_user_title"><div><span style="color: #f37b1d; padding: 0 5px;">'+self_name+'</span>的粉丝</div></div>';
                    $(".u_right_load_box").append(hea);
                    $.each(data,function(k,v){
                        var follow_cont = '<div class="follow_cont_box">' +
                            '<div class="f_heard_img"><img src="'+v["head_portrait"]+'"></div>' +
                            '<div class="f_detailed">' +
                            '<div>'+v['user_name']+'</div>' +
                            '<div>'+v["signature"]+'</div>' +
                            '<div><span class="num"><i class="icon Hui-iconfont">&#xe70c;</i>&nbsp;'+v["editor_num"]+'&nbsp;文章</span><span class="num"><i style="color: #888;" class="fa fa-users" aria-hidden="true"></i>&nbsp;'+v["fans"]+'&nbsp;粉丝</span><span class="num"><i class="fa fa-heart-o" aria-hidden="true"></i>&nbsp;'+v["follow"]+'&nbsp;关注</span></div>' +
                            '</div>' +
                            '<a class="f_he_home" href="http://www.zhangheteng.com/blog/index/user/index/id/'+v["user_id"]+'">他/她的主页</a></div>';
                        $(".u_right_load_box").append(follow_cont);
                    });
                }
            }
        });
    })

})

function getDate(tm){               //时间戳转日期时间
    return new Date(parseInt(tm) * 1000).toLocaleString().replace(/年|月/g, "-").replace(/日/g, " ");
}
