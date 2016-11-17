define([], function () {
    'use strict';

    function NewsDetailDirective () {
        return {
            restrict: 'E',
            templateUrl: 'src/js/components/newsDetail/template.html'
        }
    }

    return NewsDetailDirective;
});
