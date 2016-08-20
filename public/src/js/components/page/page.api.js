(function () {

    'use strict';

    angular
        .module('AlienCms.page')
        .service('PageApi', PageApi);

    PageApi.$inject = ['$resource'];
    function PageApi ($resource) {
        return $resource('api/v1/pages/:id/:method', {
            id: '@id',
            method: '@method'
        }, {
            get: { method: 'GET' },
            list: { method: 'GET' },
            update: { method: 'PATCH' },
            create: { method: 'PUT' },
            delete: { method: 'DELETE' }
        });
    }

})();