'use strict';

HomeController.inject = ['PageApi'];
function HomeController (PageApi) {

    console.info('HomeController initiated...');

    var promise = PageApi.get({ id: 1 }).$promise;
    promise.then(function (page) {
        console.info(page);
    });

}

export default HomeController;
