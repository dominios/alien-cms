<?php

return [

    'services' => [

        'Router' => function () {
            $routes = include 'routes.php';
            $api = include 'api.php';
            return new \Alien\Routing\Router(array_merge($routes, $api));
        },

//        'Authorization' => function (\Alien\Di\ServiceLocator $sl) {
//            $auth = new \Alien\Rbac\Authorization($sl);
//            return $auth;
//        },

//        'Filesystem' => function () {
//            $path = [__DIR__, '..', '..', '..', 'storage'];
//            return new \Alien\Filesystem\Filesystem(realpath(implode(DIRECTORY_SEPARATOR, $path)));
//        },

        'NavigationDb' => function () {
            $path = (implode(DIRECTORY_SEPARATOR, [__DIR__, '..', '..', '..', 'storage', 'navigation']));
            return new \MicroDB\Database($path);
        },

        'PageDb' => function () {
            $path = (implode(DIRECTORY_SEPARATOR, [__DIR__, '..', '..', '..', 'storage', 'page']));
            return new \MicroDB\Database($path);
        },
        
        '\Application\Providers\Page\PageProvider' => function (\Alien\Di\ServiceLocator $sl) {
            /* @var $db \MicroDB\Database */
            $db = $sl->get('PageDb');
            $adapter = new \Application\Providers\Page\PageMicroDBAdapter($db);
            return new \Application\Providers\Page\PageProvider($adapter);
        },

        '\Application\Controllers\IndexController' => function (\Alien\Di\ServiceLocator $sl) {
            $ctrl = new \Application\Controllers\IndexController();
            $ctrl->setServiceLocator($sl);
            return $ctrl;
        },

        '\Application\Controllers\Rest\NavController' => function (\Alien\Di\ServiceLocator $sl) {
            /* @var $db \MicroDB\Database */
            $db = $sl->get('NavigationDb');
            $ctrl = new Application\Controllers\Rest\NavController($db);
            $ctrl->setServiceLocator($sl);
            return $ctrl;
        },

        '\Application\Controllers\Rest\TextController' => function (\Alien\Di\ServiceLocator $sl) {
            $ctrl = new Application\Controllers\Rest\TextController();
            $ctrl->setServiceLocator($sl);
            return $ctrl;
        },

        '\Application\Controllers\Rest\PageController' => function (\Alien\Di\ServiceLocator $sl) {
            /* @var $provider \Application\Providers\Page\PageProvider */
            $provider = $sl->get('\Application\Providers\Page\PageProvider');
            $ctrl = new Application\Controllers\Rest\PageController($provider);
            $ctrl->setServiceLocator($sl);
            return $ctrl;
        }
    ]

];