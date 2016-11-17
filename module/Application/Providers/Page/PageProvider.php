<?php

namespace Application\Providers\Page;

use Application\Providers\Base\AbstractProvider;
use Application\Providers\Base\CRUDInterface;

/**
 * Provides all REST operations for Page model.
 */
class PageProvider extends AbstractProvider
{

    /**
     * PageProvider constructor.
     * @param CRUDInterface $adapter
     */
    public function __construct(CRUDInterface $adapter)
    {
        parent::__construct($adapter);
    }

    /**
     * Returns default hard-coded page model with sample values in JSON format.
     * @return array
     */
    public function getDefault()
    {
        return [
            'id' => "1", // string unique ID,
            'type' => '\Application\Models\Page\Page',
            'meta' => [
                'type' => '\Application\Models\Page\Metadata',
                'name' => "Home Page",
                'url' => '#', // string=> unique URL
                'description' => "...",
                'tags' => [
                    "foo", "bar"
                ],
                'status' => "PUBLISHED", // DRAFT, REVIEW, PUBLISHED, DELETED
                'author' => "admin@admin.sk",
                'dateCreated' => time() * 1000,
                'dateModified' => null,
                'deleted' => false
            ],
            'versioning' => [
                'version' => 1, // int=> incremental number
                'previousVersions' => [

                ]
            ],
            'localization' => [
                // feature will be added later
            ],
            'template' => [
                // template to use (for common components)
                // possible to add overrides
                'id' => "myTemplate"
            ],
            'body' => [
                // components=> ID when referenced, otherwise full data models
                'title' => "Home Page Title",
                'heading' => [],
                'main' => [
                    'newsList' => [
                        [
                            'type' => '\Application\Models\News\Article',
                            'meta' => [
                                'type' => '\Application\Models\News\Metadata',
                                'name' => 'Heading #1',
                                'description' => 'Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.',
                                'url' => '#'
                            ]
                        ],
                        [
                            'type' => '\Application\Models\News\Article',
                            'meta' => [
                                'type' => '\Application\Models\News\Metadata',
                                'name' => 'Heading #2',
                                'description' => 'Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.',
                                'url' => '#'
                            ]
                        ],
                        [
                            'type' => '\Application\Models\News\Article',
                            'meta' => [
                                'type' => '\Application\Models\News\Metadata',
                                'name' => 'Heading #3',
                                'description' => 'Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.',
                                'url' => '#'
                            ]
                        ],
                    ]
                ]
            ]
        ];
    }

}
