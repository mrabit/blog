/**
 * Created by yuany on 2016/6/23 0023.
 */
(function (w) {
    requirejs.config({
        baseUrl: window.pathName,
        waitSeconds: 15,
        paths:{
            'jquery':'jquery',
            'script':'script',
            'arttpl':'artTemplate/artTemplate_extend',
            'ajaxQueue':'jquery.ajaxQueue/jquery.ajaxQueue',
            'angular':'angular/angular.min',
            'ngMessages':'angular/angular-messages/angular-messages',
            'init-angular':'angular/init',
            'angular-route':'angular/angular-route.min',
            'easypiechart':'jquery.easypiechart/jquery.easypiechart',
            'daterangepicker':'bootstrap-daterangepicker/daterangepicker',
            'tagsinput':'bootstrap-tagsinput/bootstrap-tagsinput',
            'typeahead':'bootstrap-tagsinput/typeahead.bundle',
            'moment':'moment/moment',
            'skycons':'skycons/skycons',
            'bootstrapDialog':'bootstrap-dialog/bootstrap-dialog',
            'bootstrapPaginator':'bootstrap-paginator/bootstrap-paginator',
            'paginator':'bootstrap-paginator/paginator_extend',
            'bootstrap-wysiwyg':'bootstrap-wysiwyg/bootstrap-wysiwyg',
            'datatables':'jquery.datatables/dataTables.bootstrap.min',
            'datatables.net':'jquery.datatables/jquery.dataTables.min',
            'lazyload':'jquery.lazyload/jquery.lazyload.min',
            'hotkeys':'bootstrap-wysiwyg/external/jquery.hotkeys',
            'cookie':'jquery.cookie/jquery.cookie',
            'cropper':'cropper/cropper',
            'masonry':'masonry-docs/masonry.pkgd',
            'app.min':'app.min',
            'bootstrap':'bootstrap',
            'util':'util',
            'parsley':'parsley/parsley.min',
            'parsley.extend':'parsley/parsley.extend',
            'parsley.lang':'parsley/i18n/zh_cn',
            'parsley.lang.extend':'parsley/i18n/zh_cn.extra',
            'swal': 'sweetalert2/sweetalert2',
            'nprogress': 'nprogress/nprogress',
            'laytpl': 'laytpl'
        },
        shim:{
            'script': ["jquery","bootstrap"],
            'ajaxQueue': ["jquery"],
            'easypiechart':['jquery'],
            "angular":{
                exports:"angular"
            },
            "angular-route":{
                exports:"angular-route",
                deps: ["angular"]
            },
            'ngMessages': ["angular"],
            'init-angular': ["ngMessages"],
            'daterangepicker':['jquery','moment/moment','css!../js/bootstrap-daterangepicker/daterangepicker.css'],
            'tagsinput':['jquery',"../js/bootstrap-tagsinput/init-bootstrap-tagsinput",'css!../js/bootstrap-tagsinput/bootstrap-tagsinput.css'],
            'typeahead':['jquery','css!../js/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css'],
            'moment':['jquery'],
            'bootstrap':['jquery'],
            'bootstrapPaginator':['jquery','bootstrap'],
            'paginator':['bootstrapPaginator'],
            'bootstrap-wysiwyg':['jquery'],
            'datatables':['jquery','css!../js/jquery.datatables/dataTables.bootstrap.min.css'],
            //'datatables.net':['../js/jquery.datatables/fnReloadAjax'],
            'lazyload':['jquery'],
            'cookie':['jquery'],
            'masonry':['jquery'],
            'util':['jquery'],
            'cropper':['jquery','css!../js/cropper/cropper.css'],
            'parsley':['jquery',"../js/parsley/init-parsley",'css!../js/parsley/parsley.css'],
            'parsley.extend':['parsley','parsley.lang','parsley.lang.extend'],
            'parsley.lang':['parsley'],
            'parsley.lang.extend':['parsley'],
            'swal': ['jquery','css!../js/sweetalert2/sweetalert2.css'],
            'nprogress': ['jquery','css!../js/nprogress/nprogress.css']
        }
    });
})(window);
