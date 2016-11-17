define([
    './newsList/newsList',
    './newsDetail/newsDetail',
    './loginStatus/loginStatus',
    './pageSettings/pageSettings'
], function (newsList, newsDetail, loginStatus, pageSettings) {
    'use strict';

    angular
        .module('AlienCms.components', [
            'AlienCms.components.newsList',
            'AlienCms.components.newsDetail',
            'AlienCms.components.loginStatus',
            'AlienCms.components.pageSettings'
        ])
    ;
});