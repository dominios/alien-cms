'use strict';

NewsListController.$inject = ['$loader', 'PageApi'];
function NewsListController ($loader, PageApi) {

    var vm = this;

    activate();

    function activate () {
        var promise = PageApi.get({ id: 1 }).$promise;
        $loader.addPromise(promise);
        promise.then(function (page) {
            vm.articles = page.body.main.newsList;
        });
    }

}

export default NewsListController;
