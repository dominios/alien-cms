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

    // LoginStatusController.$inject = [];
    function LoginStatusController () {

        var vm = this;

        vm.user = {
            name: 'User Name',
            role: 'Administrator'
        };

        vm.messages = {
            count: 2
        };

        vm.alerts = {
            count: 1
        };

    }

})();