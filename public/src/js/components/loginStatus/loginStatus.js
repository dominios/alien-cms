'use strict';

import angular from 'angular';
import LoginStatusDirective from './directive';
import LoginStatusController from './controller';

const MODULE_NAME = 'alienCms.components.loginStatus';

angular
    .module(MODULE_NAME, [])
    .directive('acmsLoginStatus', LoginStatusDirective)
    .controller('LoginStatusCtrl', LoginStatusController)
;

export default MODULE_NAME;
