
app.controller('textCtrl', function($scope, $notification, TextApi, $sce) {

    TextApi.one({'id':1}).$promise.then(function (response) {
        $scope.component = response['data'];
        $scope.escapedContent = $sce.trustAsHtml($scope.component.content);
        //$scope.ckEditor = {value:$scope.component['content']};
    });

    $scope.isEditing = false;

    $scope.setToEditMode = function() {
        startEditing();
    };

    $scope.cancelEditMode = function() {
        stopEditing(false);
    };

    $scope.saveEditing = function() {
        stopEditing(true);
        $scope.escapedContent = $sce.trustAsHtml($scope.component.content);
    };

    function startEditing() {
        $scope.isEditing = true;
    }

    function stopEditing(save) {
        $scope.isEditing = false;
        if(save) {
            // todo
            console.log($scope.component);
            //TextApi.patch();
            $notification.success("Úspech!", "Zmeny boli úspešne uložené.");
        }
    }

});