define([], function () {
    'use strict';

    function PageSettingsDirective () {
        return {
            restrict: 'E',
            templateUrl: 'src/js/components/pageSettings/template.html'
        }
    }

    return PageSettingsDirective;
});
