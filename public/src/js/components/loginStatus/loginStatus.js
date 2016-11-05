define([
    './directive',
    './controller'
], function (LoginStatusDirective, LoginStatusController) {
    'use strict';

    angular
        .module('AlienCms.loginStatus', [])
        .directive('loginStatus', LoginStatusDirective)
        .controller('LoginStatusCtrl', LoginStatusController)
    ;

});