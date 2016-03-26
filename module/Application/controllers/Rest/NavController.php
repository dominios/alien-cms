<?php

namespace Application\Controllers\Rest;

use Alien\Rest\BaseRestfulController;

class NavController extends BaseRestfulController
{

    private function getStorageFileName()
    {
        return 'navigation.serialized';
    }

    protected function getFakeContent()
    {
        return [
            [
                'link' => '#link',
                'label' => 'link'
            ],
            [
                'link2' => '#link2',
                'label' => 'link2'
            ]
        ];
    }

    public function listAction()
    {
        /* @var $fs \Alien\Filesystem\Filesystem */
        $fs = $this->getServiceLocator()->get('NavbarStorage');
        $file = $fs->get($this->getStorageFileName());
        $content = unserialize($file->getFileContent());
        $file->close();
        return $this->dataResponse($content);
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