'use strict';

config.inject = ['$mdThemingProvider', '$locationProvider', '$urlRouterProvider'];
function config ($mdThemingProvider, $locationProvider, $urlRouterProvider) {

    $mdThemingProvider
        .theme('default')
        .primaryPalette('teal')
        .accentPalette('green');

    $locationProvider.hashPrefix('!');

    $urlRouterProvider.otherwise('/');

}

export default config;
