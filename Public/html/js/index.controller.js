/**
 * Created by yuany on 2016/9/14 0014.
 * AngularJs控制器：页面index的Controller
 */
define(["jquery",'init-angular'], function ($,app) {
    app.controller('web_title', function ($scope) {
        $scope.web_title = "文件上传";
    });
    app.controller("getData", function ($scope,$http) {
        $scope.getDataUrl = function () {
            var base64Image = $('.cropper-img > img').cropper("getDataURL", "image/jpeg");
            $scope.base64 = base64Image;
            $http({
                method: 'POST',
                url:uploadUrl,
                data: {image: base64Image}
            }).success(function(respone){
                $scope.upload_image = respone.path
            });
        };
    });


});