import angular from 'angular';
import UserFactory from './factory';
import UserApi from './api';

'use strict';

const MODULE_NAME = 'alienCms.models.user';

angular.module(MODULE_NAME, [])
    .factory('User', UserFactory)
    .service('UserApi', UserApi);

export default MODULE_NAME;
