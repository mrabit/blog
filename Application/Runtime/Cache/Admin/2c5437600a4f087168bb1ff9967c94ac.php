<?php if (!defined('THINK_PATH')) exit();?><div class="main" style="display:none;">
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