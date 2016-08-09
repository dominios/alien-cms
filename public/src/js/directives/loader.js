(function (angular) {

    angular.module('loader', [])

        .provider('$loader', function () {

            function Loader() {
                return {

                    queue: [],

                    addPromise: function (promise) {
                        this.queue.push(promise);
                        promise.then(function () {
                            var index = this.queue.indexOf(promise);
                            if (index > -1) {
                                this.queue.splice(index, 1);
                            }
                        }.bind(this));
                    }

                };
            }

            this.$get = [function () {
                return new Loader();
            }];

        })

        .directive('loader', ['$loader', function ($loader) {
                return {
                    restrict: 'E',
                    scope: {},
                    template: '<i class="fa fa-circle-o-notch fa-spin fa-fw" ng-show="hasPromises"></i>',
                    controller: ['$scope', '$loader', function ($scope, $loader) {

                        $scope.update = function () {
                            $scope.hasPromises = $loader.queue.length > 0;
                        };

                        $scope.queue = $loader.queue;
                        $scope.$watchCollection('queue', function () {
                            $scope.update();
                        });

                    }]
                };
            }]
        );
})(angular);