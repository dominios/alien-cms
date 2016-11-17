define([], function () {
    'use strict';

    function NewsListDirective () {
        return {
            restrict: 'E',
            templateUrl: 'src/js/components/newsList/template.html'
        }
    }

    return NewsListDirective;
});
