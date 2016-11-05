define([], function () {
    'use strict';

    // angular
    //     .module('AlienCms.page')
    //     .service('PageApi', PageApi);

    PageApi.$inject = ['$resource'];
    function PageApi ($resource) {
        return $resource('api/v1/pages/id/:id', {
            id: '@id',
            method: '@method'
        }, {
            get: { method: 'GET' },
            list: { method: 'GET', url: 'api/v1/pages' },
            update: { method: 'PATCH' },
            create: { method: 'PUT' },
            delete: { method: 'DELETE' }
        });
    }

    return PageApi;

});