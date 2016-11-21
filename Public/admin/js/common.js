/**
 * Created by yuany on 2016/9/17 0017.
 */
define(["script"], function ($) {

    var aside_item_id = localStorage["aside_item_id"];
    if($(".index-content").length > 0){
        aside_item_id = "0";
    }
    $('a[aside_item_id="'+aside_item_id+'"]').parent().addClass("active");
    $('a[aside_item_id="'+aside_item_id+'"]').parent().parent().parent().addClass("active");
    $('a[aside_item_id]').click(function () {
        localStorage["aside_item_id"] = $(this).attr("aside_item_id");
        window.location.href = $(this).attr("data-href");
    });

    $('.dropdown-toggle').dropdown();
    if(eval(localStorage["app_open"])){
        $("body").addClass("app-aside-folded");
    }
    $('[target=".app"]').click(function () {
        localStorage["app_open"] = !eval(localStorage["app_open"]);
        if($(".index-content").length > 0 ) $.initMasonry();
    });
});