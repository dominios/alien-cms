define([], function () {

    function CkEditor () {
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

                ngModel.$render = function () {
                    ck.setData(ngModel.$modelValue);
                };
            }
        }
    }

    return CkEditor;

});
