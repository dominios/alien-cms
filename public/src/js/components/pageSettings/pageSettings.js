'use strict';

import angular from 'angular';
import PageSettingsDirective from './directive';
import PageSettingsController from './controller';

const MODULE_NAME = 'alienCms.components.pageSettings';

angular
    .module(MODULE_NAME, [])
    .directive('acmsPageSettings', PageSettingsDirective)
    .controller('PageSettingsCtrl', PageSettingsController)
;

export default MODULE_NAME;
