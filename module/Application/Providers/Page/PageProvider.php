<?php

namespace Application\Providers\Page;

use Application\Providers\Base\AbstractProvider;
use Application\Providers\Base\CRUDInterface;

class PageProvider extends AbstractProvider
{

    public function __construct (CRUDInterface $adapter)
    {
        parent::__construct($adapter);
    }

    public function getDefault ()
    {
        return [
            'id' => "1", // string unique ID,
            'type' => '\Application\Models\Cms\Page\Page',
            'meta' => [
                'type' => '\Application\Models\Cms\Page\Metadata',
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
                'heading' => [
                    // example of 2 components inside 1 placeholder
                    0 => [

                    ],
                    1 => [

                    ]
                ],
                'main' => [

                ]
            ]
        ];
    }

}