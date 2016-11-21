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
<section class="content">
    <div class="wrapper">
        <section class="row padder">
            <article class="col-xs-12 padder-v">
                <p class="article-title h2">归档</p>
                <div class="entry-content m-t-md">
                    <?php if(is_array($article_list)): $i = 0; $__LIST__ = $article_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><article class="list-group archives_list">
                            <p class="h4 font-bold month_time"><time datetime="<?php echo (dateFormat($vo["archives_time"],'Y年m月')); ?>"><?php echo (dateFormat($vo["archives_time"],'Y年m月')); ?></time>(<?php echo ($vo["data_length"]); ?>)</p>
                            <ul class="padder-lg padder-v  m-l-md">
                                <?php if(is_array($vo["aaData"])): $i = 0; $__LIST__ = $vo["aaData"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('home/index/details',array('id'=>$data[id]));?>" title="<?php echo ($data["title"]); ?>"><?php echo ($data["title"]); ?></a><span class="date m-l-sm hidden-xs"><?php echo (dateFormat($data["create_time"],'Y-m-d')); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </article><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </article>
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