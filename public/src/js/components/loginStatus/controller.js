define([
], function () {
    'use strict';

    LoginStatusController.$inject = ['UserApi', '$loader'];
    function LoginStatusController (UserApi, $loader) {

        var vm = this;

        vm.messages = {
            count: 2
        };

        vm.alerts = {
            count: 1
        };

        activate();

        function activate () {
            var promise = UserApi.get({ id: 1 }).$promise;
            $loader.addPromise(promise);
            promise.then(function (user) {
                vm.user = user;
            });
        }

    }

    return LoginStatusController;
});
