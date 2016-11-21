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