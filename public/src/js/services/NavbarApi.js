var navbarServices = angular.module('navbarServices', ['ngResource']);

navbarServices.factory('NavbarApi', ['$resource',
    function($resource) {
        return $resource('api/v1/navs/:id/:method', {
            id: '@id',
            method: '@method'
        }, {
            list: { method: 'GET' },
            update: { method: 'PATCH' },
            create: { method: 'PUT' },
            delete: { method: 'DELETE' }
        });
    }
]);