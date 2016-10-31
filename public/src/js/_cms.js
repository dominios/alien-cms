(function () {

    'use strict';

    angular.module('AlienCms', [
        'ngResource',
        'ngMaterial',
        'notifications',
        'loader',
        'content-editable',
        'ngTagsInput',
        'ui.bootstrap',
        'AlienCms.navigation',
        'AlienCms.text',
        'AlienCms.page',
        'AlienCms.loginStatus'
    ]);

    angular.module('AlienCms')
        .config(function ($mdThemingProvider) {
            $mdThemingProvider.theme('default')
                .primaryPalette('teal')
                .accentPalette('green');
        });

    angular.module('AlienCms')
        .directive('ckEditor', [function () {
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
            }]
        );

})();