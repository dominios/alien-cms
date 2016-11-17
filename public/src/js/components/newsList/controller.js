define([
], function () {
    'use strict';

    NewsListController.$inject = ['$loader', 'PageApi'];
    function NewsListController ($loader, PageApi) {

        var vm = this;

        activate();

        function activate () {
            console.info('NEWS LIST CTRL ACTIVATED');
            var promise = PageApi.get({ id: 1 }).$promise;
            $loader.addPromise(promise);
            promise.then(function (response) {
                console.info(response);
            });
        }

    }

    return NewsListController;
});
