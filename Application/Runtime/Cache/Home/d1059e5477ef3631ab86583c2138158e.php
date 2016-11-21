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
        .preview-lg {
            width: 50%;
        }
        .preview {
            margin: 0 auto;
            overflow: hidden;
            background: #f7f7f7;
        }
        .upload_image{
            width: 50%;
        }
    </style>
</head>
<body class="app" >
    <section class="content hide" >
        <div class="wrapper">
            <div class="row" ng-controller="getData">
                <div class="col-xs-4 cropper-img img-circle">
                    <img src="/Uploads/Picture/2016-09-14/57d9133f0258c.jpg" class="img-full img-responsive " alt="">
                </div>
                <div class="col-xs-4">
                    <div class="preview preview-lg"></div>
                </div>
                <div class="col-xs-4">
                    <div class="upload_image">
                        <img src="{{upload_image}}" alt="" class="img-full">
                    </div>
                </div>
                <div class="col-sm-12 m-t-md">
                    <div class="row">
                        <div class="col-xs-8">
                            <input  type="file" id="upload" data-icon="false" data-classbutton="btn btn-default" data-classinput="form-control inline v-middle input-s"  tabindex="-1" style="position: absolute; clip: rect(0px 0px 0px 0px);">
                            <div class="bootstrap-filestyle input-group">
                                <input type="text" id="upload_file" class="form-control " disabled="">
                                <span class="group-span-filestyle input-group-btn" tabindex="0">
                                    <label for="upload" class="btn btn-default ">
                                        <span class="glyphicon glyphicon-folder-open"></span>
                                        Choose file
                                    </label>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 m-t-md" >
                    <button type="button" class="btn btn-default padder-lg " ng-click="getDataUrl()">获取</button>
                </div>
                <div class="col-xs-12 m-t-md">
                    <div class="form-group">
                        <textarea class="form-control"  id="cropper-img"  rows="8" ng-model="base64"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
<script>window.pathName = "/Public/static/js";</script>
<script src="/Public/static/js/require.js"></script>
<script src="/Public/static/js/main.js"></script>
<script>
    var arr = window.location.pathname.split("/");    delete arr[arr.length - 1];
    var dir = arr.join("/");
    var uploadUrl = "<?php echo U('/home/upload/getUpLoad');?>";
    require(["jquery","util","angular","/Public/html/js/index.controller.js","cropper"], function ($,u,angular) {
        angular.bootstrap(document,["ytjhApp"]);
        $('.cropper-img > img').cropper({
            aspectRatio: 1,
            preview: ".preview"
        });
        $("#upload").change(function (e) {
            $("#cropper-img").val("");
            var file = e.target.files[0];
//            //判断是否是图片类型
            if (!/image\/\w+/.test(file.type)) {
                alert("只能选择图片");
                return false;
            }
            var reader = new FileReader();
            reader.onload  = function(e) {
                $(".cropper-img").html("<img class='img-full' src='"+e.target.result+"'/>");
                $('.cropper-img img').cropper({
                    aspectRatio: 1,
                    preview: ".preview"
                });
                $("#upload_file").val(file.name);
            };
            reader.readAsDataURL(file);
        });
        $(".getDataUrl").click(function () {
            var base64Image = $('.cropper-img > img').cropper("getDataURL", "image/jpeg");
            $("#cropper-img").val(base64Image);
            $.post("<?php echo U('/home/upload/getUpLoad');?>",{image: base64Image}, function (d) {
                $("#upload_image").val(d.path)
            },"json");
        });
        $(".content").removeClass("hide");
        $(".preview").height($(".preview").width());
    });
</script>