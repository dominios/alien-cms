define([], function () {
    'use strict';

    angular
        .module('application.news', [])
        .config(config);

    config.inject = ['$stateProvider'];
    function config ($stateProvider) {
        $stateProvider
            .state('news', {
                url: '/news/:id',
                title: 'News List',
                templateUrl: 'src/js/application/news/news.tpl.html'
            });
    }

});