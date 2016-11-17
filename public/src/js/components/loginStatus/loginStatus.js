define([
    './directive',
    './controller'
], function (LoginStatusDirective, LoginStatusController) {
    'use strict';

    angular
        .module('AlienCms.components.loginStatus', [])
        .directive('acmsLoginStatus', LoginStatusDirective)
        .controller('LoginStatusCtrl', LoginStatusController)
    ;

});