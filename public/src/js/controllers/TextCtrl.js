angular.module('AlienCms.text', [])

    .factory('TextApi', ['$resource',
        function ($resource) {
            return $resource('api/v1/texts/:id/:method', {
                id: '@id',
                method: '@method'
            }, {
                one: {method: 'GET'},
                list: {method: 'GET'},
                update: {method: 'PATCH'},
                create: {method: 'PUT'},
                delete: {method: 'DELETE'}
            });
        }
    ])

    .controller('textCtrl', ['$scope', '$notification', 'TextApi', '$sce',
        function ($scope, $notification, TextApi, $sce) {

            TextApi.one({'id': 1}).$promise.then(function (response) {
                $scope.component = response['data'];
                $scope.escapedContent = $sce.trustAsHtml($scope.component.content);
                //$scope.ckEditor = {value:$scope.component['content']};
            });

            $scope.isEditing = false;

            $scope.setToEditMode = function () {
                startEditing();
            };

            $scope.cancelEditMode = function () {
                stopEditing(false);
            };

            $scope.saveEditing = function () {
                stopEditing(true);
                $scope.escapedContent = $sce.trustAsHtml($scope.component.content);
            };

            function startEditing() {
                $scope.isEditing = true;
            }

            function stopEditing(save) {
                $scope.isEditing = false;
                if (save) {
                    // todo
                    console.log($scope.component);
                    //TextApi.patch();
                    $notification.success("Úspech!", "Zmeny boli úspešne uložené.");
                }
            }

        }
    ])
;