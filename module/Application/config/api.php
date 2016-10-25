<?php

return [
    'api' => [
        'route' => '/api',
        'childRoutes' => [
            'v1' => [
                'route' => '/v1',
                'childRoutes' => [
                    'pages' => [
                        'route' => '/pages',
                        'controller' => '\Application\Controllers\Rest\PageController',
                        'action' => 'list',
                        'childRoutes' => [
                            'id' => [
                                'route' => '/id/:id',
                                'action' => 'get'
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ],
];