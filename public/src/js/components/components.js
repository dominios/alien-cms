define([
    './newsList/newsList',
    './loginStatus/loginStatus',
    './pageSettings/pageSettings'
], function (newsList, loginStatus, pageSettings) {
    'use strict';

    angular
        .module('AlienCms.components', [
            'AlienCms.components.newsList',
            'AlienCms.components.loginStatus',
            'AlienCms.components.pageSettings'
        ])
    ;
});