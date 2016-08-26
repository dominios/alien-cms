<?php

namespace Application\Controllers\Rest;


use Alien\Rest\BaseRestfulController;
use Application\Providers\Page\PageProvider;

class PageController extends BaseRestfulController
{

    /**
     * @var PageProvider
     */
    protected $provider;

    public function __construct (PageProvider $provider)
    {
        parent::__construct();
        $this->provider = $provider;

//        sleep(2);

        if (!$this->provider->exists(1)) {
            $default = $this->provider->getDefault();
            $this->provider->create($default);
        }
    }

    public function getAction ()
    {
        $id = $this->getRequest()->getParam('id');
        $data = $this->provider->get($id);
        return $this->dataResponse($data);
    }

    public function patchAction ()
    {
        $fileContent = $this->getRequest()->getContent();
        $json = json_decode($fileContent, true);
        $this->provider->update($json);
        return $this->successResponse();
    }

}