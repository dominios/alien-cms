define([], function () {

    config.inject = ['$mdThemingProvider', '$locationProvider', '$stateProvider'];
    function config ($mdThemingProvider, $locationProvider, $stateProvider) {

        $mdThemingProvider.theme('default')
            .primaryPalette('teal')
            .accentPalette('green');

        $locationProvider.hashPrefix('!');

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
