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
<style>
    .form-group {
        overflow: hidden;
    }

    /* this CSS is not part of the widget, it is here just as an example of the demo page styling.... Don't copy this one, roll your own. One
 * of the key things about the widget is that it allows you to do your own styling!
 */

    #editor {
        overflow-y: scroll;
        height: 300px;
        max-height: 300px
    }

    .bootstrap-tagsinput {
        float: left;
    }

    .img_logo {
        width: 200px;
    }
</style>
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
                            <span class="text-muted text-xs block">上次登录:<?php echo (dateFormat($userInfo["last_login_time"],'Y-m-d h:i')); ?></span>
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
<section class="app-content">
    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3">发布文章</h1>
    </div>
    <div class="wrapper">
        <form class="form-horizontal" name="article_form" id="article_form" method="get" ng-controller="article_form">
            <div class="form-group">
                <label class="col-sm-2 control-label">logo:</label>

                <div class="img_logo" id="img_logo">

                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">文章标题:</label>

                <div class="col-sm-10">
                    <input type="text" ng-model="title" name="title" required class="form-control" placeholder="输入你的标题">

                    <div ng-messages="article_form.title.$error" class="help-block m-b-none text-danger m-l-xs">
                        <div ng-if="article_form.submitted">
                            <div ng-message="required">请输入文章标题,这是必须的,由不得你</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="line line-dashed b-b line-lg pull-in"></div>
            <div class="form-group">
                <label class="col-sm-2 control-label">转载地址:</label>

                <div class="col-sm-10">
                    <input type="url" ng-model="reprint_url" name="reprint_url" class="form-control"
                           placeholder="输入文章转载地址,空则不为转载">

                    <div ng-messages="article_form.reprint_url.$error" role="alert"
                         class="help-block m-b-none text-danger m-l-xs">
                        <div ng-message="url">麻烦输入正确链接地址</div>
                    </div>
                </div>
            </div>
            <div class="line line-dashed b-b line-lg pull-in"></div>
            <div class="form-group">
                <label class="col-sm-2 control-label">文章正文:</label>

                <div class="col-sm-10">
                    <div class="hero-unit">
                        <div class="btn-toolbar m-b-sm btn-editor" data-role="editor-toolbar" data-target="#editor">

                            <div class="btn-group">
                                <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" title="Font"><i
                                        class="fa fa-font"></i><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                </ul>
                            </div>
                            <div class="btn-group dropdown" dropdown="">
                                <a class="btn btn-default" dropdown-toggle="" data-toggle="dropdown"
                                   tooltip="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="" data-edit="fontSize 5" style="font-size:24px">Huge</a></li>
                                    <li><a href="" data-edit="fontSize 3" style="font-size:18px">Normal</a></li>
                                    <li><a href="" data-edit="fontSize 1" style="font-size:14px">Small</a></li>
                                </ul>
                            </div>
                            <div class="btn-group">
                                <a class="btn btn-default" data-edit="bold"><i class="fa fa-bold"></i></a>
                                <a class="btn btn-default" data-edit="italic" tooltip="Italic (Ctrl/Cmd+I)"><i
                                        class="fa fa-italic"></i></a>
                                <a class="btn btn-default" data-edit="strikethrough" tooltip="Strikethrough"><i
                                        class="fa fa-strikethrough"></i></a>
                                <a class="btn btn-default" data-edit="underline" tooltip="Underline (Ctrl/Cmd+U)"><i
                                        class="fa fa-underline"></i></a>
                            </div>
                            <div class="btn-group">
                                <a class="btn btn-default" data-edit="insertunorderedlist" tooltip="Bullet list"><i
                                        class="fa fa-list-ul"></i></a>
                                <a class="btn btn-default" data-edit="insertorderedlist" tooltip="Number list"><i
                                        class="fa fa-list-ol"></i></a>
                                <a class="btn btn-default" data-edit="outdent" tooltip="Reduce indent (Shift+Tab)"><i
                                        class="fa fa-dedent"></i></a>
                                <a class="btn btn-default" data-edit="indent" tooltip="Indent (Tab)"><i
                                        class="fa fa-indent"></i></a>
                            </div>
                            <div class="btn-group">
                                <a class="btn btn-default btn-info" data-edit="justifyleft"
                                   tooltip="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                                <a class="btn btn-default" data-edit="justifycenter" tooltip="Center (Ctrl/Cmd+E)"><i
                                        class="fa fa-align-center"></i></a>
                                <a class="btn btn-default" data-edit="justifyright"
                                   tooltip="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                                <a class="btn btn-default" data-edit="justifyfull" tooltip="Justify (Ctrl/Cmd+J)"><i
                                        class="fa fa-align-justify"></i></a>
                            </div>
                            <div class="btn-group dropdown" dropdown="">
                                <a class="btn btn-default" dropdown-toggle="" tooltip="Hyperlink"><i
                                        class="fa fa-link"></i></a>

                                <div class="dropdown-menu">
                                    <div class="input-group m-l-xs m-r-xs">
                                        <input class="span2" placeholder="URL" type="text" data-edit="createLink"/>

                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-default" type="button">Add</button>
                                        </div>
                                    </div>
                                </div>
                                <a class="btn btn-default" data-edit="unlink" title="Remove Hyperlink"><i
                                        class="fa fa-cut"></i></a>
                            </div>
                            <div class="btn-group">
                                <a class="btn btn-default" data-edit="insertImagea"
                                   tooltip="Insert picture (or just drag &amp; drop)" id="pictureBtn"><i
                                        class="fa fa-picture-o"></i></a>
                                <!--<button type="button" class="btn btn-default" data-edit="insertImage" id="insertImage"><i class="fa fa-picture-o"></i></button>-->
                                <!--<input type="file" data-edit="insertImage" style="position:absolute; opacity:0; width:41px; height:34px">-->
                            </div>
                            <div class="btn-group">
                                <a class="btn btn-default" data-edit="undo" tooltip="Undo (Ctrl/Cmd+Z)"><i
                                        class="fa fa-undo"></i></a>
                                <a class="btn btn-default" data-edit="redo" tooltip="Redo (Ctrl/Cmd+Y)"><i
                                        class="fa fa-repeat"></i></a>
                            </div>
                            <div class="btn-group">
                                <a class="btn btn-default" data-edit="split_line" id="split_line" tooltip="分割线"><i
                                        class="fa fa-repeat"></i></a>
                            </div>
                        </div>
                        <div id="editor" class="wrapper form-control">

                        </div>
                    </div>
                </div>
            </div>
            <div class="line line-dashed b-b line-lg pull-in"></div>
            <div class="form-group">
                <label class="col-sm-2 control-label">标签填写:</label>

                <div class="col-sm-10">
                    <select multiple id="article_tags" class="pull-left"></select>

                    <div class="input-group pill-left">
                        <select id="select_value" ng-model="select_value" class="form-control m-b"
                                style="width: 150px;">
                            <option value="" disabled selected>选择已有标签</option>
                            <?php if(is_array($select_group)): $i = 0; $__LIST__ = $select_group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value='"tags_name":"<?php echo ($vo["tags_name"]); ?>","id":"<?php echo ($vo["id"]); ?>"'><?php echo ($vo["tags_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                        <span class="input-group-btn" style="position: absolute;left: 150px;">
                            <button class="btn btn-default" ng-click="add_tags()" type="button">选择</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12 text-right">
                    <button type="button" class="btn btn-primary m-l-sm m-r-sm"
                            ng-disabled="article_form.$invalid && article_form.submitted" ng-click="submit_data()">发布文章
                    </button>
                    <button type="reset" class="btn btn-default m-l-sm m-r-sm">取消</button>
                </div>
            </div>
        </form>
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
    //    var weather_url = "<?php echo U('/api/weather/get_weather');?>";
    require(["jquery", "angular", "init-angular", "bootstrap-wysiwyg", "tagsinput", 'swal'], function ($, angular, app) {

        /***
         * 页面加载loading
         */
        app.controller('page_loading', function ($scope) {
            $scope.page_loading = false;
        });
        app.controller('article_form', function ($scope, $http) {

            $scope.add_tags = function () {
                if (!$scope.select_value) return false;
                var json = JSON.parse("{" + $scope.select_value + "}");
                $('#article_tags').tagsinput('add', {"tags_name": json.tags_name, "id": json.id});
            };
            $scope.submitted = false;
            $scope.submit_data = function () {
                if (!$scope.article_form.$valid) {
                    $scope.article_form.submitted = true;
                    return false;
                }
                var edit_html = $.html_encode($("#editor").html()).split('<div class="line line-dashed b-b line-lg"></div>');
                var brief_introduction = edit_html[0];
                if (edit_html.length < 2) {
                    brief_introduction = $('<div>' + brief_introduction + '</div>').text().substring(0, 80);
                }
                var json = {
                    title: $scope.title,
                    reprint_url: $scope.reprint_url,
                    brief_introduction: $('<div>' + brief_introduction + '</div>').html(), //标签补全
                    content: edit_html[0] + (edit_html[1] || ""),
                    tags: $("#article_tags").tagsinput('items') || ""
                };
                $http({
                    method: 'POST',
                    url: "<?php echo U('/admin/article/insert_article');?>",
                    data: json
                }).success(function (respone) {
                    if (respone.code == "OK") {
                        $.swal_timer({
                            title: "文章添加成功!",
                            type: "success",
                            func: function () {
                                window.location.href = "<?php echo U('/admin/article/lists');?>";
                            },
                            dismiss: function () {
                                window.location.href = "<?php echo U('/admin/article/lists');?>";
                            }
                        });
                    }
                });
//                window.sweetHTML = '<div class="row">' +
//                        '<div class="col-xs-6">asd</div>' +
//                        '<div class="col-xs-6">qwe</div>' +
//                        '</div>'
//                var a = new swal({
//                    html: window.sweetHTML
//                });
            }
        });

        angular.bootstrap(document, ["ytjhApp"]);

        var wysiwyg = $('#editor').wysiwyg({
//            hotKeys: {
//                'ctrl+b meta+b': 'bold',
//                'ctrl+i meta+i': 'italic',
//                'ctrl+u meta+u': 'underline',
//                'ctrl+z meta+z': 'undo',
//                'ctrl+y meta+y meta+shift+z': 'redo'
//            },
            uploadImgUrl: "<?php echo U('/home/upload/getUpLoad');?>"
        });

        $("#article_tags").tagsinput({
            itemValue: 'id',
            itemText: 'tags_name',
            maxTags: 5,
            trimValue: true
        });
        //保存已存在字段
        window.tags_arr = new Map();
        $.each($("#select_value option"), function (k, v) {
            if ($(v).val()) {
                var temp = JSON.parse('{' + $(v).val() + '}');
                window.tags_arr.set(temp["tags_name"], temp);
            }
        });

//        $('#article_tags').tagsinput('add', { "text": "Amsterdam",value:"1"});

//        require(["parsley",'parsley.extend'], function () {
//            $("#article_form").parsley(window.ParsleyConfig).on("form:submit", function () {
//                alert("成功");
//                return false;
//            });
//        });


        $(".main").fadeIn();
    });
</script>