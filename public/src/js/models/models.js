define([
    './user/user',
    './page/page'
], function (user, page) {
    'use strict';

    angular
        .module('AlienCms.models', [
            'AlienCms.models.user',
            'AlienCms.models.page'
        ])
    ;
});