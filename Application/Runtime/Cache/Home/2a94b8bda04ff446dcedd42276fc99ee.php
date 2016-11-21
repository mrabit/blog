<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php if($blog_title == null): ?><title><?php echo (getTitle($web_title)); ?></title>
        <!--<title><?php echo U('Common/getTitle');?></title>-->
        <?php else: ?>
        <title><?php echo ($blog_title); ?> - <?php echo (getTitle($web_title)); ?></title><?php endif; ?>
    <link rel="stylesheet" href="/Public/static/css/bootstrap.css">
    <link rel="stylesheet" href="/Public/static/css/app.min.css">
    <link rel="stylesheet" href="/Public/static/css/font-awesome.min.css">
    <link rel="stylesheet" href="/Public/static/css/animate.css">
    <link rel="stylesheet" href="/Public/static/css/simple-line-icons.css">
    <link rel="stylesheet" href="/Public/html/css/common.css">
</head>
<body class="app">
<nav id="sidebar" class="behavior_1">
    <div class="text-center m-t-lg profile ">
        <a href="index.html" class="block">
            <img src="/Uploads/Picture/2016-09-14/57d9133f0258c.jpg" class="thumb-lg avatar image_logo" alt="">
        </a>
        <?php if($web_title == null): ?><span class="m-t-md block h4 sidebar_title hidden-sm hidden-xs"><?php echo (getTitle($web_title)); ?></span>
            <?php else: ?>
            <p class="text-center text-lg header_title m-b-none"><?php echo ($web_title); ?></p><?php endif; ?>
    </div>
    <ul class="nav_list padder-lg">
        <li class="list-inline m-t-md block">
            <a class="block" href="<?php echo U('/home/index/index');?>" title="首页">
                <i class="iconfont fa fa-home"></i>
                <span class="text-md visible-md-inline visible-lg-inline">首页</span>
            </a>
        </li>
        <li class="list-inline m-t-md">
            <a class="block" href="<?php echo U('/home/archives/index');?>" title="归档">
                <i class="iconfont fa fa-archive"></i>
                <span class="text-md visible-md-inline visible-lg-inline">归档</span>
            </a>
        </li>
        <li class="list-inline m-t-md">
            <a class="block" href="<?php echo U('/home/tags/index');?>" title="标签">
                <i class="iconfont fa fa-tags"></i>
                <span class="text-md visible-md-inline visible-lg-inline">标签</span>
            </a>
        </li>
        <li class="list-inline m-t-md">
            <a class="block" href="about.html" title="关于">
                <i class="iconfont fa fa-user"></i>
                <span class="text-md visible-md-inline visible-lg-inline">关于</span>
            </a>
        </li>
        <li class="list-inline m-t-md">
            <a class="block" href="<?php echo U('/home/bing/index');?>" title="bing美图">
                <i class="iconfont fa fa-file-image-o"></i>
                <span class="text-md visible-md-inline visible-lg-inline">bing美图</span>
            </a>
        </li>
        <li class="list-inline m-t-md">
            <a class="block" href="/page/slideshare/" title="分享">
                <i class="iconfont fa fa-share-alt"></i>
                <span class="text-md visible-md-inline visible-lg-inline">分享</span>
            </a>
        </li>
    </ul>
</nav>
<header class="header navbar navbar-inverse navbar-fixed-top visible-xs-block">
    <div id="menuToggle"><i class="fa fa-align-justify"></i></div>
    <?php if($web_title == null): ?><p class="text-center text-lg header_title m-b-none"><?php echo (getTitle($web_title)); ?></p>
        <?php else: ?>
        <p class="text-center text-lg header_title m-b-none"><?php echo ($web_title); ?></p><?php endif; ?>
    <a class="me"><img src="/Uploads/Picture/2016-09-14/57d9133f0258c.jpg" class=" avatar " alt=""></a>
</header>
<div id="sidebar-mask"></div>
<!--<link rel="stylesheet" href="/Public/html/css/index.css">-->
<section class="content" style="">
    <!--<div class="m-t-xl" id="page_loading">
    <div class="col-md-12 text-center">
        <i class="fa fa-spin fa-spinner fa-2x"></i>
        <div class="clear m-t-xs">
            <span class="text-xs">页面正在加载，请稍候...</span>
        </div>
    </div>
</div>-->
    <div class="wrapper" id="main">
        <section class="row padder" >
            <div id="lists_content">

            </div>
            <div id="article_loading" style="display: none">
                <div class="col-md-12 text-center">
                    <i class="fa fa-spin fa-spinner fa-2x"></i>
                    <div class="clear m-t-xs">
                        <span class="text-xs">列表正在加载，请稍候...</span>
                    </div>
                </div>
            </div>
            <div id="warning" style="display: none">
                <p class="text-center">已到最后一页</p>
            </div>
        </section>
    </div>
</section>
<footer id="footer" class="inner text-center content" >
    <div class="wrapper">
        <div class="col-xs-12">
            <p class=" padder-v" style="line-height: 1.8;border-top: 1px solid #fff;font-size: .9em;">
                © 2016&nbsp;-&nbsp; 一桶浆糊的博客 &nbsp;-&nbsp;
                <a target="_blank" rel="nofollow" class="external beian" href="http://www.miitbeian.gov.cn/">蜀ICP备15034839号-1</a>
            </p>
        </div>
    </div>
</footer>
</body>
</html>
<script>window.pathName = "/Public/static/js";</script>
<script src="/Public/static/js/require.js"></script>
<script src="/Public/static/js/main.js"></script>
<script>
    //    require(["angular","init-angular",dir+"ctrlLogin.js"],function(angular){
    //        angular.bootstrap(document,["xxxapp"]);
    //    });
    require(["/Public/html/js/common.js"]);
</script>
<script>
    require(["script"], function ($) {

        var json = '<?php echo ($get); ?>';
        json = json !=null?JSON.parse(json):"";
        //当前页数
        var currPage = 0;
        //每页条数
        var pageSize = 3;
        //总页数
        var totalPage = 0;
        //是否已在加载数据
        $.ajax_loading = false;

        //获取总页数
        $.post("<?php echo U('/home/index/get_article_totalPage');?>", $.extend({pageSize:pageSize},json), function (d) {
            totalPage = d.result;
        },"json");

        //首次加载
        var param = $.extend({start:currPage*pageSize,length:pageSize},json);
        $.load_article_lists_html("<?php echo U('/home/index/lists');?>",param ,500,currPage);

        $(window).scroll(function () {
            /*判断窗体高度与竖向滚动位移大小相加 是否 超过内容页高度*/
            if (($(window).height() + $(window).scrollTop()) >= $("body").height()) {
                if($.ajax_loading == false){
                    if(currPage >= totalPage - 1){
                        $("#warning p").text("已到最后一页");
                        $("#warning").fadeIn();
                        return false;
                    }
                    currPage++;
                    var param = $.extend({start:currPage*pageSize,length:pageSize},json);
                    $.load_article_lists_html("<?php echo U('/home/index/lists');?>",param ,500,currPage);
                }else{
                    console.log("执行ing...")
                }
            }
        });
    });
</script>