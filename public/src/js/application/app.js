define([
    './home/home',
    './news/news'
], function (home, news) {
   'use strict';

    angular
        .module('application', ['application.home', 'application.news']);
});