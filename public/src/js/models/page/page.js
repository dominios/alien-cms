'use strict';

import angular from 'angular';
import PageFactory from './factory';
import PageApi from './api';

const MODULE_NAME = 'alienCms.models.page';

angular.module(MODULE_NAME, [])
    .factory('Page', PageFactory)
    .service('PageApi', PageApi);

export default MODULE_NAME;
