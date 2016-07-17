angular.module('AlienCms.page', [])

    .service('PageApi', ['$resource',
        function ($resource) {
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
    ])

    .controller('PageCtrl', ['$scope', '$notification', 'PageApi',
        function ($scope, $notification, PageApi) {

            $scope.page = null;
            $scope.viewOptions = {
                isHomePage: false,
                statusClass: 'label-primary'
            };

            PageApi.get({ id: 1 }).$promise.then(function (response) {
                $scope.page = response['data'];
                console.info($scope.page);
                reloadViewOptions();
            });

            $scope.clonePage = function () {
                $notification.warning("Warning!", "This feature has not been implemented yet.");
            };

            $scope.savePage = function () {
                PageApi.update($scope.page).$promise.then(function () {
                    $notification.success("Success!", "Your changes has been saved.");
                });
            };

            $scope.deletePage = function () {
                $scope.page.meta.deleted = true;
                $scope.page.meta.status = 'DELETED';
                PageApi.update($scope.page).$promise.then(function () {
                    $notification.success("Success!", "Page has been deleted.");
                    reloadViewOptions();
                });
            };

            $scope.restorePage = function () {
                $scope.page.meta.deleted = false;
                $scope.page.meta.status = 'DRAFT';
                PageApi.update($scope.page).$promise.then(function () {
                    $notification.success("Success!", "Page has been restored.");
                    reloadViewOptions();
                });
            };

            var reloadViewOptions = function () {
                $scope.viewOptions.isHomePage = $scope.page.meta.url === '#';
                $scope.viewOptions.isDeleted = $scope.page.meta.deleted === true;
                switch ($scope.page.meta.status) {
                    case 'DRAFT': $scope.viewOptions.statusClass = 'label-primary'; break;
                    case 'REVIEW': $scope.viewOptions.statusClass = 'label-info'; break;
                    case 'PUBLISHED': $scope.viewOptions.statusClass = 'label-success'; break;
                    case 'DELETED': $scope.viewOptions.statusClass = 'label-danger'; break;
                    default: $scope.viewOptions.statusClass = 'label-primary'; break;
                }
            }

        }
    ])
;
