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
    <link rel="stylesheet" href="/Public/static/js/bootstrap-tagsinput/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="../../../../Public/static/css/bootstrap.css">
    <style>

    </style>
</head>
<body class="app" >
<section class="content" >
    <div class="wrapper">
        <input type="text" value="" data-role="tagsinput">
    </div>
</section>
</body>
</html>
<script>window.pathName = "/Public/static/js";</script>
<script src="/Public/static/js/jquery.js"></script>
<script src="/Public/static/js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
<script src="http://localhost:8080/dist/bootstrap-tagsinput.min.js"></script>
<script>

</script>