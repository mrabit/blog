<?php if (!defined('THINK_PATH')) exit();?><nav id="sidebar" class="behavior_1">
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
            <a class="block" href="index.html" title="首页">
                <i class="iconfont fa fa-home"></i>
                <span class="text-md visible-md-inline visible-lg-inline">首页</span>
            </a>
        </li>
        <li class="list-inline m-t-md">
            <a class="block" href="archives.html" title="归档">
                <i class="iconfont fa fa-archive"></i>
                <span class="text-md visible-md-inline visible-lg-inline">归档</span>
            </a>
        </li>
        <li class="list-inline m-t-md">
            <a class="block" href="tags.html" title="标签">
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
            <a class="block" href="/links/" title="友链">
                <i class="iconfont fa fa-link"></i>
                <span class="text-md visible-md-inline visible-lg-inline">友链</span>
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