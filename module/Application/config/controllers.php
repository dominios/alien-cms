<?php

return [
    'controllers' => [
        'Application\Controllers\IndexController' => [
            'prepareView' => function($action) {
                return new \Alien\Mvc\Template(__DIR__ . '/views/index/' . str_replace('Action', '', $action) . '.phtml');
            },
            'components' => [
                'nav' => function() {
                    return new \Application\Models\Cms\Components\Navigation\NavigationComponent([
                        'Home' => '#',
                        'Projects' => '#',
                        'Services' => '#',
                        'Downloads' => '#',
                        'About' => '#',
                        'Contact' => '#',
                    ]);
                }
            ],
        ]
    ],
];
