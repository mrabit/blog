<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title ng-controller="web_title" ng-bind="web_title"><?php echo ($blog_title); ?></title>
    <link rel="stylesheet" href="/Public/static/css/bootstrap.css">
    <link rel="stylesheet" href="/Public/static/css/app.min.css">
    <link rel="stylesheet" href="/Public/static/css/font-awesome.min.css">
    <link rel="stylesheet" href="/Public/static/css/animate.css">
    <link rel="stylesheet" href="/Public/static/css/simple-line-icons.css">
    <link rel="stylesheet" href="../../../../Public/static/css/bootstrap.css">
    <style>
        #editor {
            overflow-y:scroll;
            height:500px;
            max-height:500px
        }
    </style>
</head>
<body class="app" >
<section class="content">
    <div class="wrapper">
        <form class="form-horizontal" method="get">
            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="btn-toolbar m-b-sm btn-editor" data-role="editor-toolbar" data-target="#editor">
                        <div class="btn-group dropdown" dropdown="">
                            <a class="btn btn-default" dropdown-toggle="" tooltip="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="" data-edit="fontName Serif" style="font-family:'Serif'">Serif</a></li>
                                <li><a href="" data-edit="fontName Sans" style="font-family:'Sans'">Sans</a></li>
                                <li><a href="" data-edit="fontName Arial" style="font-family:'Arial'">Arial</a></li></ul>
                        </div>
                        <div class="btn-group dropdown" dropdown="">
                            <a class="btn btn-default" dropdown-toggle="" data-toggle="dropdown" tooltip="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="" data-edit="fontSize 5" style="font-size:24px">Huge</a></li>
                                <li><a href="" data-edit="fontSize 3" style="font-size:18px">Normal</a></li>
                                <li><a href="" data-edit="fontSize 1" style="font-size:14px">Small</a></li>
                            </ul>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-default" data-edit="bold" tooltip="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                            <a class="btn btn-default" data-edit="italic" tooltip="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                            <a class="btn btn-default" data-edit="strikethrough" tooltip="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                            <a class="btn btn-default" data-edit="underline" tooltip="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-default" data-edit="insertunorderedlist" tooltip="Bullet list"><i class="fa fa-list-ul"></i></a>
                            <a class="btn btn-default" data-edit="insertorderedlist" tooltip="Number list"><i class="fa fa-list-ol"></i></a>
                            <a class="btn btn-default" data-edit="outdent" tooltip="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                            <a class="btn btn-default" data-edit="indent" tooltip="Indent (Tab)"><i class="fa fa-indent"></i></a>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-default btn-info" data-edit="justifyleft" tooltip="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                            <a class="btn btn-default" data-edit="justifycenter" tooltip="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                            <a class="btn btn-default" data-edit="justifyright" tooltip="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                            <a class="btn btn-default" data-edit="justifyfull" tooltip="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                        </div>
                        <div class="btn-group dropdown" dropdown="">
                            <a class="btn btn-default" dropdown-toggle="" tooltip="Hyperlink"><i class="fa fa-link"></i></a>
                            <div class="dropdown-menu">
                                <div class="input-group m-l-xs m-r-xs">
                                    <input class="form-control input-sm" id="LinkInput" placeholder="URL" type="text" data-edit="createLink">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-default" type="button">Add</button>
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-default" data-edit="unlink" tooltip="Remove Hyperlink"><i class="fa fa-cut"></i></a>
                        </div>

                        <div class="btn-group">
                            <a class="btn btn-default" tooltip="Insert picture (or just drag &amp; drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                            <input type="file" data-edit="insertImage" style="position:absolute; opacity:0; width:41px; height:34px">
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-default" data-edit="undo" tooltip="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                            <a class="btn btn-default" data-edit="redo" tooltip="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                        </div>
                    </div>
                    <div id="editor" class="wrapper form-control">
                        一桶浆糊
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
</body>
</html>
<script>window.pathName = "/Public/static/js";</script>
<script src="/Public/static/js/require.js"></script>
<script src="/Public/static/js/main.js"></script>
<script>
    require(["jquery"], function ($) {
        require(["bootstrap-wysiwyg"], function () {
            var wysiwyg = $('#editor').wysiwyg({
                uploadImgUrl: "<?php echo U('/home/upload/getUpLoad');?>"
            });
        });
        $(".main").fadeIn();
    });
</script>