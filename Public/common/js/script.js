/**
 * Created by yuany on 2016/9/29 0029.
 */
require(["jquery"], function ($) {
    (function ($,owner) {
        owner.load_lists_html = function (url,param, timeOut, loading_type) {
            setTimeout(function(){
                $.ajax({
                    async: false,
                    url: url,
                    data: param,
                    success: function (data) {
                        if(loading_type == 1){
                            $('#lists_content').html(data);
                            $.show_main(50);
                        }else{
                            $('#lists_content').append(data);
                        }
                    }
                });
            },timeOut);
        }
    })($,document);
});