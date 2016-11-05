define([], function () {
    'use strict';

    function LoginStatusDirective () {
        return {
            restrict: 'E',
            templateUrl: 'src/js/components/loginStatus/template.html'
        }
    }

    return LoginStatusDirective;
});
