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
    <style>
        .btn{
            padding: 7px 15px;
        }
    </style>
</head>
<body ng-controller="login" ng-hide="body_hide">
<div class="app app-header-fixed ">
    <div class="modal-over bg-black" >
        <div class="modal-center animated fadeInUp text-center" style="width:200px;margin:-100px 0 0 -100px;">
            <div class="thumb-lg">
                <img src="<?php echo ($header_img); ?>" class="img-circle">
            </div>
            <form name="login_form" >
                <p class="h4 m-t m-b">yuany</p>
                <div class="input-group">
                    <input ng-disabled="login_btn" ng-minlength="5" ng-maxlength="20" required name="password" ng-change="hide_err_mess()" type="password" ng-model="upwd" class="form-control text-sm  no-border" value="" placeholder="输入密码进行下一步">
                <span class="input-group-btn">
                    <button type="button" name="login" ng-disabled="login_btn" ng-click="login()" class="btn btn-success  no-border"><i class="fa fa-arrow-right"></i></button>
                </span>
                </div>
                <div ng-messages="login_form.password.$error" name="valid_hide"  class="help-block text-left m-b-none text-danger m-l-xs hide">
                        <div ng-message="required">请输入密码</div>
                        <div ng-message="minlength">密码长度不能小于5</div>
                        <div ng-message="maxlength">密码长度不能大于20</div>
                </div>
                <span class="help-block text-left m-b-none {{err_color}} m-l-xs" ng-show="err_mess_show" ng-bind="err_mess"></span>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<script>window.pathName = "/Public/static/js";</script>
<script src="/Public/static/js/app.min.js"></script>
<script src="/Public/static/js/require.js"></script>
<script src="/Public/static/js/main.js"></script>
<script>
    require(['script','init-angular',"angular"], function ($,app,angular) {
        app.controller("login", function ($scope,$http) {
//            $scope.login_form.submitted = true;
            $scope.submitted = true;
            $scope.err_mess_show = false;
            $scope.uname = "yuany";
            $scope.login = function () {
                if (!$scope.login_form.$valid) {
                    angular.element("[name='valid_hide']").removeClass("hide");
                    $scope.login_form.submitted = true;
                    return false;
                }
                var ajaxStatus = $http({
                    method: 'POST',
                    url:"<?php echo U('/admin/login/login_by_uname');?>",
                    data: {uname:$scope.uname,upwd: $scope.upwd}
                }).success(function(respone){
                    $scope.err_mess_show = true;
                    if(respone.code == "OK"){
                        $scope.err_color = "text-success";
                        $scope.login_btn = true;
                        $scope.err_mess = respone.message;
                        var time = $.GetRandomNum(1,4);
                        setTimeout(function () {
                            window.location.href = "<?php echo U('/admin/index');?>";
                        },time);
                    }else{
                        $scope.err_color = "text-danger";
                        $scope.err_mess = respone.message;
                    }
                });
            };
            $scope.hide_err_mess = function () {
                $scope.err_mess_show = false;
            };
        });
        angular.bootstrap(document,["ytjhApp"]);

        $(document).on('keyup',function(e){
            if(e.keyCode === 13){
                $('[name="login"]').click();
            }
        });
    });
</script>