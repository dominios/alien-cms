define([], function () {
    'use strict';

    PageApi.$inject = ['$resource', 'Page'];
    function PageApi ($resource, Page) {

        var Interceptors = {
            response: function (response) {
                var page = new Page();
                page.setData(response.data.data);
                return page;
            }
        };

        return $resource('api/v1/pages/id/:id', {
            id: '@id',
            method: '@method'
        }, {
            get: { method: 'GET', interceptor: Interceptors, cache: true },
            list: { method: 'GET', url: 'api/v1/pages' },
            update: { method: 'PATCH' },
            create: { method: 'PUT' },
            delete: { method: 'DELETE' }
        });
    }

    return PageApi;

});