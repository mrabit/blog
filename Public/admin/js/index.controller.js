/**
 * Created by yuany on 2016/9/17 0017.
 * AngularJs控制器：页面index的Controller
 */
define(["script", 'init-angular',"moment","skycons"], function ($, app,moment) {
    window.moment = moment;
    var ajaxCount = 0;
    var ajaxDone = 2;
    var then_func = function (result) {
        ajaxCount++;
    };
    var finally_func = function ($scope) {
        if(ajaxCount == ajaxDone){
            $scope.$$prevSibling.page_loading = false;
            $.show_main();
            $.initMasonry();
        }
    };
    /***
     * 24小时内文章
     */
    app.controller("recent_article", function ($scope,$http,$q) {
        var deferred= $q.defer();
        var promise = deferred.promise;
        promise.then(then_func()).finally(finally_func($scope));
        $scope.article_loading = false;
        $scope.customer = "额";
        $http({
            method: 'POST',
            url:recent_article,
            data: {time: moment().subtract(1, 'days').format('X')}
        }).success(function(respone){
            if(respone.code == "OK"){
                $scope.article_list = respone.result.aaData;
                $scope.article_length = respone.result.aaData.length;
            }else{
                $scope.article_length = 0;
            }
            deferred.resolve(respone);
        });
    });
    
    app.directive("article", function () {
        return {
            link: function($scope, ele, attr) {
                var create_time = moment.unix($scope.data.create_time);
                $scope.title = $scope.data.title;
                $scope.time = create_time.format("HH:mm");
                $scope.user = $scope.data.uname;
                $scope.url = "/home/index/details/id/"+$scope.data.id+".html";
                $scope.date = create_time.format("YYYY-MM-DD");
            }
        }
    });

    /***
     * 天气
     */
    app.controller('widget_weather', function ($scope,$http,$q ) {
        var deferred= $q.defer();
        var promise = deferred.promise;
        promise.then(then_func()).finally(finally_func($scope));
        $scope.weather_loading = false;
        $scope.get_weather = function () {
            //显示widget-weather-loading
            $scope.weather_loading = ! $scope.weather_loading;
            $http({
                method: 'POST',
                url:weather_url,
                data: {area: "101270106"}
            }).success(function(respone){
                /***
                 * 绑定数据
                 */
                $scope.city = respone.retData.city;
                $scope.pinyin = respone.retData.pinyin;
                $scope.temp = respone.retData.temp;
                $scope.date = "20"+respone.retData.date;
                $scope.weather = respone.retData.weather;
                get_weather_fonts(respone.retData.weather);
                //隐藏widget-weather-loading
                $scope.weather_loading = ! $scope.weather_loading;
                deferred.resolve(respone);
            });
        };
        $scope.get_weather();
    });

    /***
     * 当前时间
     */
    app.controller("date_time", function ($scope,$interval) {
       $scope.time = moment().format("YYYY-MM-DD HH:mm:ss");
        $interval(function () {
            $scope.time = moment().format("YYYY-MM-DD HH:mm:ss");
        },1000);
    });

    /***
     * 页面加载loading
     */
    app.controller('page_loading', function ($scope) {
       //$scope.page_loading = true;
    });

    /***
     * 获取天气图标
     * @param weather 天气
     */
    function  get_weather_fonts(weather){
        var weather_font = "none";
        if(weather.indexOf("晴") >= 0 ){
            weather_font = "CLEAR_DAY";
        }else if(weather.indexOf("云") >= 0){
            weather_font = "PARTLY_CLOUDY_DAY";
        }else if(weather.indexOf("阴") >= 0){
            weather_font = "CLOUDY";
        }else  if(weather.indexOf("雨") >= 0){
            weather_font = "RAIN";
        }else if(weather.indexOf("雨") >= 0 && weather.indexOf("雪") >= 0){
            weather_font = "SLEET";
        }else if(weather.indexOf("雪") >= 0){
            weather_font = "SNOW";
        }else if(weather.indexOf("雪") >= 0 || weather.indexOf("霾") >= 0){
            weather_font = "FOG";
        }else if(weather.indexOf("沙") >= 0 || weather.indexOf("浮") >= 0){
            weather_font = "WIND";
        }else{
            weather_font = "none";
        }
        var skycons = new Skycons({"color": "white"});
        skycons.add("rain", eval("Skycons."+weather_font));
        skycons.play();
    }


});