define([
    './config',
    './directives/ckeditor',
    './directives/loader',
    './application/app',
    './models/models',
    './components/components'
], function (config, ckeditor, loader, application, models, components) {
    'use strict';

    var app = angular.module('AlienCms', [
        'ngResource',
        'ngMaterial',
        'ui.router',
        'loader',
        'application',
        'content-editable',
        'AlienCms.models',
        'AlienCms.components'
    ]);

    app.config(config);
    app.directive('ckeditor', ckeditor);

});
