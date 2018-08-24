$(function(){
    //获取宽度
    $(".cb-contain").each(function(){
        var width=$(this).width();

        $(this).find(".j-chartPanel").width(width)
    });

});