(function () {

    'use strict';

    angular
        .module('AlienCms.page')
        .controller('PageCtrl', PageController);

    PageController.$inject = ['$scope', '$notification', '$loader', 'PageApi'];
    function PageController ($scope, $notification, $loader, PageApi) {

        $scope.page = null;
        $scope.viewOptions = {
            isHomePage: false,
            isSaving: false,
            statusClass: 'label-primary',
            availableStatuses: [
                'DRAFT', 'REVIEW', 'PUBLISHED'
            ]
        };

        var promise = PageApi.get({ id: 1 }).$promise;
        $loader.addPromise(promise);
        promise.then(function (response) {
            $scope.page = response.data;
            reloadViewOptions();
        });

        $scope.setStatus = function (status) {
            $scope.page.meta.deleted = false;
            $scope.page.meta.status = status;
            $scope.savePage();
            reloadViewOptions();
        };

        $scope.clonePage = function () {
            $notification.warning("Warning!", "This feature has not been implemented yet.");
        };

        $scope.savePage = function () {
            $scope.viewOptions.isSaving = true;
            $scope.page.meta.dateModified = Date.now();
            var promise = PageApi.update($scope.page).$promise;
            $loader.addPromise(promise);
            promise.then(function () {
                $notification.success("Success!", "Your changes has been saved.");
                $scope.viewOptions.isSaving = false;
            });
        };

        $scope.deletePage = function () {
            $scope.page.meta.deleted = true;
            $scope.page.meta.status = 'DELETED';
            var promise = PageApi.update($scope.page).$promise;
            $loader.addPromise(promise);
            promise.then(function () {
                $notification.success("Success!", "Page has been deleted.");
                reloadViewOptions();
            });
        };

        $scope.restorePage = function () {
            $scope.page.meta.deleted = false;
            $scope.page.meta.status = 'DRAFT';
            var promise = PageApi.update($scope.page).$promise;
            $loader.addPromise(promise);
            promise.then(function () {
                $notification.success("Success!", "Page has been restored.");
                reloadViewOptions();
            });
        };

        var reloadViewOptions = function () {
            $scope.viewOptions.isHomePage = $scope.page.meta.url === '#';
            $scope.viewOptions.isDeleted = $scope.page.meta.deleted === true;
            switch ($scope.page.meta.status) {
                case 'DRAFT':
                    $scope.viewOptions.statusClass = 'primary';
                    break;
                case 'REVIEW':
                    $scope.viewOptions.statusClass = 'info';
                    break;
                case 'PUBLISHED':
                    $scope.viewOptions.statusClass = 'success';
                    break;
                case 'DELETED':
                    $scope.viewOptions.statusClass = 'danger';
                    break;
                default:
                    $scope.viewOptions.statusClass = 'primary';
                    break;
            }
        }

    }

})();