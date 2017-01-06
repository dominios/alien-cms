define([
    './config',
    './directives/ckeditor',
    './directives/loader',
    './models/models',
    './components/components'
], function (config, ckeditor, loader, models, components) {
    'use strict';

    var app = angular.module('AlienCms', [
        'ngResource',
        'ngMaterial',
        'ui.router',
        'loader',
        'content-editable',
        'AlienCms.models',
        'AlienCms.components'
    ]);

    app.config(config);
    app.directive('ckeditor', ckeditor);

});
