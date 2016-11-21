<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head ng-controller="web_title">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!--<?php if($blog_title == null): ?>-->
        <!--<title><?php echo (getAdminTitle($web_title)); ?></title>-->
        <!--&lt;!&ndash;<title><?php echo U('Common/getTitle');?></title>&ndash;&gt;-->
        <!--<?php else: ?>-->
        <!--<title><?php echo ($blog_title); ?> - <?php echo (getAdminTitle($web_title)); ?></title>-->
    <!--<?php endif; ?>-->
    <title>{{web_title}}</title>
    <link rel="stylesheet" href="/Public/static/css/bootstrap.css">
    <link rel="stylesheet" href="/Public/static/css/app.min.css">
    <link rel="stylesheet" href="/Public/static/css/font-awesome.min.css">
    <link rel="stylesheet" href="/Public/static/css/animate.css">
    <link rel="stylesheet" href="/Public/static/css/simple-line-icons.css">
    <link rel="stylesheet" href="/Public/html/css/common.css">
</head>
<body class="app">

</body>
</html>
<script>window.pathName = "/Public/static/js";</script>
<script src="/Public/static/js/app.min.js"></script>
<script src="/Public/static/js/require.js"></script>
<script src="/Public/static/js/main.js"></script>
<!--<script src="/Public/admin/js/common.js"></script>-->
<script>
    require(["angular","/Public/admin/js/index.js"], function (angular) {
        angular.bootstrap(document,["ytjhApp"]);
    });
</script>