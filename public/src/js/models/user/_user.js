(function () {
    'use strict';

    angular
        .module('AlienCms.Models.User', [])
        .factory('User', function () {

            function User(name, role) {
                this.name = name;
                this.role = role;
            }

            User.prototype = {
                setData: function (data) {
                    angular.extend(this, data);
                }
            };

            return User;

        })
})();