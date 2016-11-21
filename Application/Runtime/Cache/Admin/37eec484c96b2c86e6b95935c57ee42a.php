<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php if($blog_title == null): ?><title><?php echo (getAdminTitle($web_title)); ?></title>
        <!--<title><?php echo U('Common/getTitle');?></title>-->
        <?php else: ?>
        <title><?php echo ($blog_title); ?> - <?php echo (getAdminTitle($web_title)); ?></title><?php endif; ?>
    <link rel="stylesheet" href="/Public/static/css/bootstrap.css">
    <link rel="stylesheet" href="/Public/static/css/app.min.css">
    <link rel="stylesheet" href="/Public/static/css/font-awesome.min.css">
    <link rel="stylesheet" href="/Public/static/css/animate.css">
    <link rel="stylesheet" href="/Public/static/css/simple-line-icons.css">
    <link rel="stylesheet" href="/Public/admin/css/common.css">
</head>
<body class="app">
<div class="m-t-xl" ng-controller="page_loading" ng-show="page_loading">
    <div class="col-md-12 text-center">
        <i class="fa fa-spin fa-spinner fa-2x"></i>
        <div class="clear m-t-xs">
            <span class="text-xs">页面正在加载，请稍候...</span>
        </div>
    </div>
</div>
<div class="main" style="display:none;">
    <header id="header" class="app-header navbar" role="menu">
        <!-- navbar header -->
        <div class="navbar-header bg-dark">
            <button class="pull-right visible-xs dk" ui-toggle-class="show" target=".navbar-collapse">
                <i class="glyphicon glyphicon-cog"></i>
            </button>
            <button class="pull-right visible-xs" ui-toggle-class="off-screen" target=".app-aside" ui-scroll="app">
                <i class="glyphicon glyphicon-align-justify"></i>
            </button>
            <!-- brand -->
            <a href="#/" class="navbar-brand text-lt">
                <i class="fa fa-btc"></i>
                <!--<img src="img/logo.png" alt="." class="hide">-->
                <span class="hidden-folded m-l-xs">一桶浆糊</span>
            </a>
            <!-- / brand -->
        </div>
        <!-- / navbar header -->

        <!-- navbar collapse -->
        <div class="collapse pos-rlt navbar-collapse box-shadow bg-white-only">
            <!-- buttons -->
            <div class="nav navbar-nav hidden-xs">
                <a href="#" class="btn no-shadow navbar-btn" ui-toggle-class="app-aside-folded" target=".app">
                    <i class="fa fa-dedent fa-fw text"></i>
                    <i class="fa fa-indent fa-fw text-active"></i>
                </a>
                <!--<a href="#" class="btn no-shadow navbar-btn" ui-toggle-class="show" target="#aside-user">-->
                <!--<i class="icon-user fa-fw"></i>-->
                <!--</a>-->
            </div>
            <!-- / buttons -->

            <!-- link and dropdown -->
            <ul class="nav navbar-nav hidden-sm">
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                        <i class="fa fa-fw fa-plus visible-xs-inline-block"></i>
                        <span translate="header.navbar.new.NEW">New</span> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#" translate="header.navbar.new.PROJECT">Projects</a></li>
                        <li>
                            <a href="">
                                <span class="badge bg-info pull-right">5</span>
                                <span translate="header.navbar.new.TASK">Task</span>
                            </a>
                        </li>
                        <li><a href="" translate="header.navbar.new.USER">User</a></li>
                        <li class="divider"></li>
                        <li>
                            <a href="">
                                <span class="badge bg-danger pull-right">4</span>
                                <span translate="header.navbar.new.EMAIL">Email</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- / link and dropdown -->

            <!-- search form -->
            <form class="navbar-form navbar-form-sm navbar-left shift" ui-shift="prependTo" data-target=".navbar-collapse"
                  role="search" >
                <div class="form-group">
                    <div class="input-group">
                        <input type="text"
                               class="form-control input-sm bg-light no-border rounded padder"
                               placeholder="Search projects...">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-sm bg-light rounded"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </div>
            </form>
            <!-- / search form -->

            <!-- nabar right -->
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle clear">
                        <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                            <img src="/<?php echo ($userInfo['user_header_img']); ?>" alt="...">
                            <i class="on md b-white bottom"></i>
                        </span>
                        <span class="hidden-sm hidden-md"><?php echo ($userInfo["uname"]); ?></span> <b class="caret"></b>
                    </a>
                    <!-- dropdown -->
                    <ul class="dropdown-menu  w">
                        <!--<li class="divider"></li>-->
                        <li>
                            <a href="<?php echo U('admin/login/logout');?>">退出登录</a>
                        </li>
                    </ul>
                    <!-- / dropdown -->
                </li>
            </ul>
            <!-- / navbar right -->
        </div>
        <!-- / navbar collapse -->
    </header>
    <aside id="aside" class="app-aside hidden-xs bg-dark">
        <div class="aside-wrap">
            <div class="navi-wrap">
                <!-- user -->
                <div class="clearfix hidden-xs text-center show" id="aside-user">
                    <div class="dropdown wrapper">
                        <a href="app.page.profile">
                <span class="thumb-lg w-auto-folded avatar m-t-sm">
                  <img src="/<?php echo ($userInfo['user_header_img']); ?>" class="img-full" alt="...">
                </span>
                        </a>
                        <a href="#" class=" hidden-folded">
                        <span class="clear">
                              <span class="block m-t-sm">
                                <strong class="font-bold text-lt"><?php echo ($userInfo["uname"]); ?></strong>
                              </span>
                            <span class="text-muted text-xs block">欢迎回来.</span>
                        </span>
                            <div class="quick-stats">
                                <ul class="no-padder">
                                    <li class="inline"><span>456<i>今日文章</i></span></li>
                                    <li class="inline"><span>2,345<i>今日访客</i></span></li>
                                    <li class="inline"><span>120<i>历史访客</i></span></li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    <div class="line dk hidden-folded"></div>
                </div>
                <!-- / user -->

                <!-- nav -->
                <nav ui-nav="" class="navi clearfix">
                    <ul class="nav">
                        <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                            <span>概括</span>
                        </li>
                        <li class="">
                            <a aside_item_id="0" href="javascript:void(0)" data-href="/admin/index/index.html">
                                <i class="icon-home icon text-primary-dker"></i>
                                <span>首页</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="" class="auto">
                                <span class="pull-right text-muted">
                                    <i class="fa fa-fw fa-angle-right text"></i>
                                    <i class="fa fa-fw fa-angle-down text-active"></i>
                                </span>
                                <i class="glyphicon glyphicon-book icon text-primary-dker"></i>
                                <span class="font-bold">文章管理</span>
                            </a>
                            <ul class="nav nav-sub dk">
                                <li class="nav-sub-header">
                                    <a href="">
                                        <span>文章管理</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a aside_item_id="338" href="javascript:void(0)" data-href="<?php echo U('/admin/article/lists');?>">
                                        <span>文章列表</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a aside_item_id="339" href="javascript:void(0)" data-href="<?php echo U('/admin/article/add');?>">
                                        <span>发布文章</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="">
                            <a href="" class="auto">
                                <span class="pull-right text-muted">
                                    <i class="fa fa-fw fa-angle-right text"></i>
                                    <i class="fa fa-fw fa-angle-down text-active"></i>
                                </span>
                                <i class="glyphicon glyphicon-book icon text-primary-dker"></i>
                                <span class="font-bold">标签管理</span>
                            </a>
                            <ul class="nav nav-sub dk">
                                <li class="nav-sub-header">
                                    <a href="">
                                        <span>标签管理</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a aside_item_id="340" href="javascript:void(0)" data-href="<?php echo U('/admin/tags');?>" >
                                        <span>标签展示</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="line dk"></li>

                        <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                            <span>管理</span>
                        </li>
                        <li>
                            <a href="" class="auto">
                                <span class="pull-right text-muted">
                                    <i class="fa fa-fw fa-angle-right text"></i>
                                    <i class="fa fa-fw fa-angle-down text-active"></i>
                                </span>
                                <b class="badge bg-info pull-right">3</b>
                                <i class="glyphicon glyphicon-th"></i>
                                <span>Layout</span>
                            </a>
                            <ul class="nav nav-sub dk">
                                <li class="nav-sub-header">
                                    <a href="">
                                        <span>Layout</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="layout_app.html">
                                        <span>Application</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="layout_fullwidth.html">
                                        <span>Full width</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="layout_boxed.html">
                                        <span>Boxed layout</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- nav -->
            </div>
        </div>
    </aside>
<link rel="stylesheet" href="/Public/static/css/csshake/csshake.css">
<style>
    .tags_group .tags {
        border: 1px solid rgba(36, 121, 204, .8);
        color: rgba(36, 121, 204, .8);
        padding: 0 30px;
        line-height: 40px;
        font-weight: normal;
        position: relative;
    }

    .tags_group .tags:hover {
        /*font-weight:bold;*/
        border-color: #2479CC;
        color: #2479CC;
    }

    .tags_group .tags:hover i {
        display: block !important;
        position: absolute;
        right: 2px;
        top: 2px;
    }
</style>
<section class="app-content">
    <div class="wrapper">
        <div class="tags_group" ng-controller="tags_group">
            <?php if($tags_arr != null): if(is_array($tags_arr)): $i = 0; $__LIST__ = $tags_arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="label inline m-t-sm tags m-r-sm shake-little" style="font-size: <?php echo (template_multiplication($vo["counts"],$vo.counts)); ?>px;"><i class="fa fa-times text-danger hide"
                                                                               ng-click="delete_tags('<?php echo ($vo["id"]); ?>','<?php echo ($vo["tags_name"]); ?>')"></i><?php echo ($vo["tags_name"]); ?>(<?php echo ($vo["counts"]); ?>)</a><?php endforeach; endif; else: echo "" ;endif; ?>
                <?php else: ?>
                <p class=" h4">暂无标签</p><?php endif; ?>
        </div>
    </div>
</section>
</div>
</body>
</html>
<script>window.pathName = "/Public/static/js";</script>
<script src="/Public/static/js/app.min.js"></script>
<script src="/Public/static/js/require.js"></script>
<script src="/Public/static/js/main.js"></script>
<!--<script src="/Public/admin/js/common.js"></script>-->
<script>
    //    require(["angular","init-angular",dir+"ctrlLogin.js"],function(angular){
    //        angular.bootstrap(document,["xxxapp"]);
    //    });
    require(["/Public/admin/js/common.js"]);
</script>
<script>
    require(["jquery", "angular", "init-angular", "swal"], function ($, angular, app) {
        /***
         * 页面加载loading
         */
        app.controller('page_loading', function ($scope) {
            $scope.page_loading = false;
        });
        app.controller('tags_group', function ($scope, $http) {
            $scope.delete_tags = function (id, tags_name) {
                $.swal_delete("确认删除?",
                    "你将删除'" + tags_name + "'这个标签,请确认是否继续!",
                    function (resolve, reject) {
                        $http({
                            method: 'POST',
                            url: "<?php echo U('/admin/tags/delete_tags');?>",
                            data: {id: id}
                        }).success(function (respone) {
                            if (respone.code == "OK") {
                                resolve();
                            }
                        });
                    }
                );
            };
        });


        angular.bootstrap(document, ["ytjhApp"]);
        $(".main").fadeIn();
    });
</script>