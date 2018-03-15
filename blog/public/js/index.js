/**
 * 搜索联想功能组件
 * 参数属性：loading(加载动画，可自定义,但是必须有id)，dataName(后台回传回来的数据的键值的名称，必填的属性)，link（后台数据请求的地址，必填属性）
 * 作者：ZHT
 * 时间；2017-12-18
 * **/
(function($){
    $.fn.searchAssociate = function(options){
        var defaults = {
            loading: "<div id='loader' class='loader loader--audioWave'></div>",
        }
        var opt = $.extend(defaults,options);
        return this.each(function(k,v) {
            $(opt.elementName).css("position", "relative").append('<div class="associate_tip"></div>');
            var h = $(opt.elementName).outerHeight();
            $(opt.elementName).children(".associate_tip").css({
                "width": "100%",
                "height": "auto",
                "position": "absolute",
                "top": h,
                "left": "0",
                "background-color": "#ffffff",
                "box-shadow": "0 4px 5px rgba(0, 0, 0, 0.35)",
                "z-index": "9999",
                "display": "none"
            });
            $(v).on("keyup", function () {
                var cur = $(this);
                var search_cont = $(this).val();
                if (search_cont == '') {
                    $(this).nextAll(".associate_tip").hide();
                } else {
                    $(this).nextAll(".associate_tip").show().addClass("show_associate").html(opt.loading);
                    $.ajax({
                        type: 'post',
                        url: opt.link,
                        data: {search:search_cont},
                        dataType: 'json',
                        success: function(data){
                            var load = $(opt.loading).attr("id");
                            $("#"+load).remove();
                            if(data == ""){
                                cur.nextAll(".associate_tip").html('<div style="width: 100%; height: 40px; line-height: 40px; text-align: center; font-size: 14px;">暂无数据！</div>');
                            }else {
                                cur.nextAll(".associate_tip").children(".associate_cont").remove();
                                $.each(data,function(m,n){
                                    cur.nextAll(".associate_tip").append("<div class='associate_cont'>"+n[opt.dataName]+"</div>");
                                    cur.nextAll(".associate_tip").children(".associate_cont").css({
                                        "width":"94%",
                                        "height": "25px",
                                        "line-height":"25px",
                                        "padding":"0 3%",
                                        "border-bottom":"1px dashed #eeeeee",
                                        "cursor":"pointer",
                                        "font-size":"11px"
                                    }).hover(function(){
                                        $(this).css("background-color","#eeeeee");
                                    },function(){
                                        $(this).css("background-color","#ffffff");
                                    });
                                    cur.nextAll(".associate_tip").children(".associate_cont").on("click",function(){
                                        var new_cont = $(this).text();
                                        cur.val(new_cont);
                                        cur.nextAll(".associate_tip").fadeOut();
                                    });
                                })
                            }
                        }
                    });
                }
            })
            $(v).blur(function(){
                $(this).nextAll(".associate_tip").fadeOut();
            });
        })
    }
})(jQuery)