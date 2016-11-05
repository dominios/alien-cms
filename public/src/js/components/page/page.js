define([
    './api',
    './controller'
], function (PageApi, PageController) {
    angular
        .module('AlienCms.page', [])
        .service('PageApi', PageApi)
        .component('pageSettings', {
            templateUrl: 'src/js/components/page/template.html'
        })
        .controller('PageCtrl', PageController)
    ;
});