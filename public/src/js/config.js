define([], function () {

    config.inject = ['$mdThemingProvider', '$locationProvider', '$stateProvider', '$urlRouterProvider'];
    function config ($mdThemingProvider, $locationProvider, $stateProvider, $urlRouterProvider) {

        $mdThemingProvider.theme('default')
            .primaryPalette('teal')
            .accentPalette('green');

        $locationProvider.hashPrefix('!');

        $urlRouterProvider.otherwise('/');

        $stateProvider
            .state('home', {
                url: '/',
                title: 'Welcome!',
                // template: '<acms-news-list></acms-news-list>'
                template: '<h3>Home!</h3>'
            })
            .state('news', {
                url: '/news/:id',
                title: 'News List',
                template: '<acms-news-detail></acms-news-detail>'
            })
    }

    return config;
});
