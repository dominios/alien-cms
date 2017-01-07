define([], function () {

    angular
        .module('application.home', [])
        .config(config);

    config.inject = ['$stateProvider'];
    function config ($stateProvider) {
        $stateProvider
            .state('home', {
                url: '/',
                title: 'Welcome!',
                templateUrl: 'src/js/application/home/home.tpl.html'
            });
    }

});