define([
    './directive',
    './controller'
], function (NewsListDirective, NewsListController) {
    'use strict';

    angular
        .module('AlienCms.components.newsList', [])
        .directive('acmsNewsList', NewsListDirective)
        .controller('newsListCtrl', NewsListController)
    ;

});