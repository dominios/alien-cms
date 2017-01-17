'use strict';

import angular from 'angular';
import NewsDetailDirective from './directive';
import NewsDetailController from './controller';

const MODULE_NAME = 'alienCms.components.newsDetail';

angular
    .module(MODULE_NAME, [])
    .directive('acmsNewsDetail', NewsDetailDirective)
    .controller('NewsDetailCtrl', NewsDetailController)
;

export default MODULE_NAME;
