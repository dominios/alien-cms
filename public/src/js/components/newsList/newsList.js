'use strict';

import angular from 'angular';
import NewsListDirective from './directive';
import NewsListController from './controller';

const MODULE_NAME = 'alienCms.components.newsList';

angular
    .module(MODULE_NAME, [])
    .directive('acmsNewsList', NewsListDirective)
    .controller('newsListCtrl', NewsListController)
;

export default MODULE_NAME;
