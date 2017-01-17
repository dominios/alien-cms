'use strict';

import angular from 'angular';
import page from '../../models/page/page';
import HomeController from './controller';

const MODULE_NAME = 'application.home';

angular
    .module(MODULE_NAME, [page])
    .config(config);

config.inject = ['$stateProvider'];
function config ($stateProvider) {
    $stateProvider
        .state('home', {
            url: '/',
            title: 'Welcome!',
            templateUrl: 'src/js/application/home/home.tpl.html',
            controller: HomeController
        });
}

export default MODULE_NAME;
