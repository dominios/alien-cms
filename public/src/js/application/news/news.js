'use strict';

import angular from 'angular';

const MODULE_NAME = 'application.news';

angular
    .module(MODULE_NAME, [])
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

export default MODULE_NAME;
