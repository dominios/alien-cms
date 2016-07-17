<?php

return [

    'services' => [
        'Router' => function () {
            $routes = include 'routes.php';
            $api = include 'api.php';
            return new \Alien\Routing\Router(array_merge($routes, $api));
        },
        'Connection' => function (\Alien\Di\ServiceLocator $sl) {
            $conf = $sl->get('\Alien\Configuration')->get('database');
            $connection = new Alien\Db\Connection(
                $conf['host'],
                $conf['user'],
                $conf['password'],
                $conf['database']
            );
            $connection->setDbPrefix($conf['prefix']);
            return $connection;
        },
        'Authorization' => function (\Alien\Di\ServiceLocator $sl) {
            $auth = new \Alien\Rbac\Authorization($sl);
            return $auth;
        },
        'Filesystem' => function () {
            $path = [__DIR__, '..', '..', '..', 'storage'];
            return new \Alien\Filesystem\Filesystem(realpath(implode(DIRECTORY_SEPARATOR, $path)));
        },
        'NavigationDb' => function () {
            $path = (implode(DIRECTORY_SEPARATOR, [__DIR__, '..', '..', '..', 'storage', 'navigation']));
            return new \MicroDB\Database($path);
        },
        'PageDb' => function () {
            $path = (implode(DIRECTORY_SEPARATOR, [__DIR__, '..', '..', '..', 'storage', 'page']));
            return new \MicroDB\Database($path);
        },
        '\Application\Controllers\IndexController' => function (\Alien\Di\ServiceLocator $sl) {
            $ctrl = new \Application\Controllers\IndexController();
            $ctrl->setServiceLocator($sl);
            return $ctrl;
        },
        '\Application\Controllers\Rest\NavController' => function (\Alien\Di\ServiceLocator $sl) {
            $db = $sl->get('NavigationDb');
            /* @var $db \MicroDB\Database */
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
            $db = $sl->get('PageDb');
            /* @var $db \MicroDB\Database */
            $ctrl = new Application\Controllers\Rest\PageController(@$db);
            $ctrl->setServiceLocator($sl);
            return $ctrl;
        }
    ]

];