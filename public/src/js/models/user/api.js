(function () {

    'use strict';

    angular
        .module('AlienCms.Models.User')
        .service('UserManager', UserManager)
        .service('UserApi', UserApi);

    UserApi.$inject = ['$resource', 'User'];
    function UserApi ($resource, User) {
        
        var Interceptors = {
            response: function(response) {
                var user = new User();
                user.setData(response.data.data);
                return user;
            }
        };
        
        return $resource('api/v1/users/id/:id', {
            id: '@id'
        }, {
            get: { method: 'GET', interceptor: Interceptors }
        });
    }

    UserManager.$inject = ['UserApi', 'User'];
    function UserManager(UserApi, User) {

        var UserManager = {

            _pool: {},

            _retrieveInstance: function(id, data) {
                var instance = this._pool[id];
                if (instance) {
                    instance.setData(data);
                } else {
                    instance = new User();
                    instance.setData(data)
                    this._pool[id] = instance;
                }
                return instance;
            }

        };
    }

})();