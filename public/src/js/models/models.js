'use strict';

import angular from 'angular';
import user from './user/user';
import page from './page/page';

const MODULE_NAME = 'alienCms.models';

angular.module(MODULE_NAME, [
    user,
    page
]);

export default MODULE_NAME;
