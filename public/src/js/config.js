define([], function () {

    config.inject = ['$mdThemingProvider', '$locationProvider', '$routeProvider'];
    function config ($mdThemingProvider, $locationProvider, $routeProvider) {

        $mdThemingProvider.theme('default')
            .primaryPalette('teal')
            .accentPalette('green');

        $locationProvider.hashPrefix('!');

        $routeProvider
            .when('/', {
                template: '<acms-news-list></acms-news-list>'
            })
            .when('/news/:id', {
                template: '<acms-news-detail></acms-news-detail>'
            })
            .otherwise('/');
    }

    return config;
});
