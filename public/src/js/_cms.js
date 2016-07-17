'use strict';

angular.module('AlienCms', [
    'content-editable',
    'ngResource',
    'notifications',
    'AlienCms.navigation',
    'AlienCms.text',
    'AlienCms.page'
]).directive('ckEditor', [function () {
    return {
        require: '?ngModel',
        link: function ($scope, elm, attr, ngModel) {

            CKEDITOR.disableAutoInline = true;

            var ck = CKEDITOR.inline(elm[0]);

            ck.on('pasteState', function () {
                $scope.$apply(function () {
                    ngModel.$setViewValue(ck.getData());
                });
            });

            ngModel.$render = function (value) {
                ck.setData(ngModel.$modelValue);
            };
        }
    };
}]);