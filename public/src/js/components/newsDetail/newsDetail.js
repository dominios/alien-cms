define([
    './directive',
    './controller'
], function (NewsDetailDirective, NewsDetailController) {
    'use strict';

    angular
        .module('AlienCms.components.newsDetail', [])
        .directive('acmsNewsDetail', NewsDetailDirective)
        .controller('NewsDetailCtrl', NewsDetailController)
    ;

});