'use strict';

import angular from 'angular';
import newsList from './newsList/newsList';
import newsDetail from './newsDetail/newsDetail';
import loginStatus from  './loginStatus/loginStatus';
import pageSettings from './pageSettings/pageSettings';

const MODULE_NAME = 'alienCms.components';

angular
    .module('alienCms.components', [
        newsList,
        newsDetail,
        loginStatus,
        pageSettings
    ])
;

export default MODULE_NAME;
