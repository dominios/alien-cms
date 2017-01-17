'use strict';

import angular from 'angular';
import ngResource from 'angular-resource';
import ngMaterial from 'angular-material';
import uiRouter from 'angular-ui-router';
import config from './config';
import loader from './directives/loader';
import ckeditor from './directives/ckeditor';
import models from './models/models';
import components from './components/components';
import application from './application/app';

'use strict';

const MODULE_NAME = 'alienCms';

let app = angular.module(MODULE_NAME, [
    ngResource,
    ngMaterial,
    uiRouter,
    loader,
    models,
    components
]);

app.config(config);
app.directive('ckeditor', ckeditor);

// temporarily use setTimeout
// currently, template from BE comes with usage of cms directive (acms-page-settings) which is not loaded at this time
// need to bootstrap app after small delay (so directive is fully ready)
// @todo remove ANY dependency from HTML which comes initially from BE to fix this!
setTimeout(() => angular.bootstrap(document, [MODULE_NAME, application]), 500);
