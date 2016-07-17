<?php

namespace Application\Controllers\Rest;


use Alien\Rest\BaseRestfulController;
use MicroDB\Database;

class PageController extends BaseRestfulController
{

    /**
     * @var Database
     */
    protected $db;


    public function __construct (Database $database)
    {
        parent::__construct();
        $this->db = $database;

        if (!$this->db->exists(1)) {
            $this->db->create($this->createDefault());
        }
    }

    public function getAction ()
    {
        $id = $this->getRequest()->getParam('id');
        $data = $this->db->load($id);
        return $this->dataResponse($data);
    }

    public function createDefault ()
    {
        return
            [
                'id' => "myPageId", // string unique ID
                'meta' => [
                    'name' => "Home Page",
                    'url' => '#', // string=> unique URL
                    'description' => "...",
                    'tags' => [
                        "foo", "bar"
                    ],
                    'status' => "PUBLISHED", // DRAFT, REVIEW, PUBLISHED, DELETED
                    'author' => "admin@admin.sk",
                    'dateCreated' => "timestamp",
                    'dateModified' => "timetsamp"
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