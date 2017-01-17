'use strict';

import angular from 'angular';
import home from './home/home';
import news from './news/news';

const MODULE_NAME = 'application';

angular
    .module(MODULE_NAME, [home, news]);

export default MODULE_NAME;
