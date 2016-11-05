define([
    './factory',
    './api'
], function (UserFactory, UserApi) {

    angular.module('AlienCms.Models.User', [])
        .factory('User', UserFactory)
        .service('UserApi', UserApi);

});
