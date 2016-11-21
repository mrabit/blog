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
<style>
    .preview-lg {
        width: 100%;
    }

    .preview {
        float: left;
        margin-right: 15px;
        margin-bottom: 15px;
        overflow: hidden;
        background: #f7f7f7;
    }

</style>
<section class="content hide">
    <div class="wrapper">
        <div class="row">
            <div class="col-xs-4 cropper-img">
                <img src="http://blog.mrabit.com/Uploads/bing/480.2016-10-29.jpg" class="img-full img-responsive">
            </div>
            <div class="col-xs-4">
                <div class="preview preview-lg"></div>
            </div>
            <div class="col-xs-8">
                <input type="file" id="file" data-icon="false" data-classbutton="btn btn-default" data-classinput="form-control inline v-middle input-s" tabindex="-1" style="position: absolute; clip: rect(0px 0px 0px 0px);">
                <div class="bootstrap-filestyle input-group">
                    <input type="text" class="form-control "  id="show_file" disabled="">
                    <span class="group-span-filestyle input-group-btn" tabindex="0">
                        <label for="file" class="btn btn-default ">
                            <span class="glyphicon glyphicon-folder-open"></span>
                            Choose file
                        </label>
                    </span>
                </div>
            </div>
            <div class="col-xs-12">
                <button type="button" class="btn btn-default padder-lg getDataUrl">获取</button>
            </div>
            <div class="col-xs-12 m-t-md">
                <div class="form-group">
                    <textarea class="form-control" id="cropper-img" rows="8"></textarea>
                </div>
            </div>
        </div>
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
    require(["jquery", "cropper"], function ($) {

        $(".getDataUrl").click(function () {
            var type = "image/png";
            var image_base64 = $('.cropper-img > img').cropper("getDataURL", "image/png");
            image_base64 = image_base64.replace("data:"+type+";base64,","");
            $("#cropper-img").val(image_base64);
            $.post("<?php echo U('/home/qiniu/qiniu_base64');?>",{post_string: image_base64}, function (d) {
                console.log(d);
            },"json");
        });

        $('#file').change(function (e) {
            var file = e.target.files[0];
            $("#show_file").val(file.name);
            var reader = new FileReader();
            reader.onload = function (e) {
                var $img = $('<img>').attr("src", e.target.result).addClass("img-full");
                $(".cropper-img").empty().append($img);
                $('.cropper-img > img').cropper({
                    aspectRatio: 1,
                    preview: ".preview"
                });
                $(".preview").height($('.cropper-img > img').height());

            };
            reader.readAsDataURL(file);
        });

        $(".content").removeClass("hide");

    });
</script>