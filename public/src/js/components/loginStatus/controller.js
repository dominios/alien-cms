(function () {

    'use strict';

    angular
        .module('AlienCms.loginStatus')

        .directive('loginStatus', function () {
            return {
                restrict: 'E',
                templateUrl: 'src/js/components/loginStatus/template.html'
            }
        })

        .controller('LoginStatusCtrl', LoginStatusController);

    LoginStatusController.$inject = ['User', 'UserApi', '$loader'];
    function LoginStatusController (User, UserApi, $loader) {

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

})();