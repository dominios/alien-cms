var textServices = angular.module('textServices', ['ngResource']);
textServices.factory('TextApi', ['$resource',
    function($resource) {
        return $resource('api/v1/texts/:id/:method', {
            id: '@id',
            method: '@method'
        }, {
            one: {method: 'GET'},
            list: { method: 'GET' },
            update: { method: 'PATCH' },
            create: { method: 'PUT' },
            delete: { method: 'DELETE' }
        });
    }
]);