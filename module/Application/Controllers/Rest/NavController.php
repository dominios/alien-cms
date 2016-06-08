<?php

namespace Application\Controllers\Rest;

use Alien\Rest\BaseRestfulController;
use MicroDB\Database;

class NavController extends BaseRestfulController
{

    /**
     * @var Database
     */
    protected $db;

    public function __construct(Database $database)
    {
        parent::__construct();
        $this->db = $database;

        if (!$this->db->exists(1)) {
            $this->db->create($this->getFakeContent());
        }
    }

    protected function getFakeContent()
    {
        return [
            [
                'link' => '#link',
                'label' => 'link'
            ],
            [
                'link' => '#link2',
                'label' => 'link2'
            ],
            [
                'link' => '#link3',
                'label' => 'link4'
            ],
            [
                'link' => '#link4',
                'label' => 'link5'
            ],
            [
                'link' => '#link5',
                'label' => 'link5'
            ]
        ];
    }

    public function listAction()
    {
        $data = $this->db->load(1);
        return $this->dataResponse($data);
    }

    public function patchAction()
    {
        $fileContent = $this->getRequest()->getContent();
        $json = json_decode($fileContent, true);

        /* @var $fs \Alien\Filesystem\Filesystem */
        $fs = $this->getServiceLocator()->get('NavbarStorage');
        $file = $fs->get($this->getStorageFileName());

        $file->setFileContent(serialize($json));
        $file->save();
        $file->close();

        return $this->successResponse();

    }

}