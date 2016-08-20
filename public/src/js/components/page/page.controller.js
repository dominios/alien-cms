(function () {

    'use strict';

    angular
        .module('AlienCms.page')
        .component('pageSettings', {
            templateUrl: 'src/js/components/page/template.html'
        })
        .controller('PageCtrl', PageController);

    PageController.$inject = ['$scope', '$notification', '$loader', 'PageApi'];

    function PageController ($scope, $notification, $loader, PageApi) {

        var vm = this;
        vm.page = null;
        vm.options = {
            isHomePage: false,
            isSaving: false,
            isDeleting: false,
            isRestoring: false,
            isCloning: false,
            statusClass: 'label-primary',
            availableStatuses: [
                'DRAFT', 'REVIEW', 'PUBLISHED'
            ]
        };
        vm.setStatus = setStatus;
        vm.clonePage = clonePage;
        vm.savePage = savePage;
        vm.deletePage = deletePage;
        vm.restorePage = restorePage;

        activate();

        function activate () {
            var promise = PageApi.get({ id: 1 }).$promise;
            $loader.addPromise(promise);
            promise.then(function (response) {
                vm.page = response.data;
                reloadOptions();
            });
        }

        function setStatus (status) {
            vm.page.meta.deleted = false;
            vm.page.meta.status = status;
            savePage();
            reloadOptions();
        }

        function clonePage () {
            $notification.warning("Warning!", "This feature has not been implemented yet.");
        }

        function savePage () {
            vm.options.isSaving = true;
            vm.page.meta.dateModified = Date.now();
            var promise = PageApi.update(vm.page).$promise;
            $loader.addPromise(promise);
            promise.then(function () {
                $notification.success("Success!", "Your changes has been saved.");
                vm.options.isSaving = false;
            });
        }

        function deletePage () {
            vm.options.isDeleting = true;
            vm.page.meta.deleted = true;
            vm.page.meta.status = 'DELETED';
            var promise = PageApi.update(vm.page).$promise;
            $loader.addPromise(promise);
            promise.then(function () {
                $notification.success("Success!", "Page has been deleted.");
                vm.options.isDeleting = false;
                reloadOptions();
            });
        }

        function restorePage () {
            vm.options.isRestoring = true;
            vm.page.meta.deleted = false;
            vm.page.meta.status = 'DRAFT';
            var promise = PageApi.update(vm.page).$promise;
            $loader.addPromise(promise);
            promise.then(function () {
                $notification.success("Success!", "Page has been restored.");
                vm.options.isRestoring = false;
                reloadOptions();
            });
        }

        var reloadOptions = function () {
            vm.options.isHomePage = vm.page.meta.url === '#';
            vm.options.isDeleted = vm.page.meta.deleted === true;
            switch (vm.page.meta.status) {
                case 'DRAFT':
                    vm.options.statusClass = 'primary';
                    break;
                case 'REVIEW':
                    vm.options.statusClass = 'info';
                    break;
                case 'PUBLISHED':
                    vm.options.statusClass = 'success';
                    break;
                case 'DELETED':
                    vm.options.statusClass = 'danger';
                    break;
                default:
                    vm.options.statusClass = 'primary';
                    break;
            }
        }

    }

})();