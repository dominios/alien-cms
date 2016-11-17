define([
    './directive',
    './controller'
], function (PageSettingsDirective, PageSettingsController) {
    'use strict';

    angular
        .module('AlienCms.components.pageSettings', [])
        .directive('acmsPageSettings', PageSettingsDirective)
        .controller('PageSettingsCtrl', PageSettingsController)
    ;

});