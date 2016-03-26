<?php

return [
    'api' => [
        'route' => '/api',
        'namespace' => '',
        'action' => '',
        'childRoutes' => [
            'v1' => [
                'route' => '/v1',
                'namespace' => '',
                'action' => '',
                'childRoutes' => [
                    'navs' => [
                        'route' => '/navs[/:id][/:method]',
                        'namespace' => '',
                        'controller' => 'Application\Controllers\Rest\NavController',
                        'action' => 'rest',
                        'defaults' => [
                            'method' => 'list',
                        ]
                    ],
                    'texts' => [
                        'route' => '/texts[/:id][/:method]',
                        'namespace' => '',
                        'controller' => 'Application\Controllers\Rest\TextController',
                        'action' => 'rest',
                        'defaults' => [
                            'method' => 'list',
                        ]
                    ]
                ]
            ]
        ]
    ],
];