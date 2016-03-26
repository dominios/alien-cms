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
        'NavbarStorage' => function () {
            $path = [__DIR__, '..', '..', '..', 'storage', 'navigation'];
            return new \Alien\Filesystem\Filesystem(realpath(implode(DIRECTORY_SEPARATOR, $path)));
        }
    ]

];