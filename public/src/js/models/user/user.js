define([
    './factory',
    './api'
], function (UserFactory, UserApi) {

    angular.module('AlienCms.models.user', [])
        .factory('User', UserFactory)
        .service('UserApi', UserApi);

});
