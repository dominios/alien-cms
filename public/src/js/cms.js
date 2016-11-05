define([
    './config',
    './directives/ckeditor',
    './directives/loader',
    './models/models',
    './components/page/page',
    './components/loginStatus/loginStatus'
], function (config, ckeditor, loader, Models, page, loginStatus) {
    'use strict';

    var app = angular.module('AlienCms', [
        'ngResource',
        'ngMaterial',
        'loader',
        'content-editable',
        'AlienCms.Models',
        'AlienCms.page',
        'AlienCms.loginStatus'
    ]);

    app.config(config);
    app.directive('ckeditor', ckeditor);

});
