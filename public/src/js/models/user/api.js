define([], function () {
    'use strict';

    UserApi.$inject = ['$resource', 'User'];
    function UserApi ($resource, User) {

        var Interceptors = {
            response: function (response) {
                var user = new User();
                user.setData(response.data.data);
                return user;
            }
        };

        return $resource('api/v1/users/id/:id', {
            id: '@id'
        }, {
            get: { method: 'GET', interceptor: Interceptors, cache: true }
        });
    }

    return UserApi;

});