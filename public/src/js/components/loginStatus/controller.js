(function () {

    'use strict';

    angular
        .module('AlienCms.loginStatus')
        .component('loginStatus', {
            templateUrl: 'src/js/components/loginStatus/template.html'
        })
        .controller('LoginStatusCtrl', LoginStatusController);

    // LoginStatusController.$inject = [];

    function LoginStatusController () {

        var vm = this;

    }

})();