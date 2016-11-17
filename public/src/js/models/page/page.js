define([
    './factory',
    './api'
], function (PageFactory, PageApi) {
    angular
        .module('AlienCms.models.page', [])
            .factory('Page', PageFactory)
            .service('PageApi', PageApi)
    ;
});