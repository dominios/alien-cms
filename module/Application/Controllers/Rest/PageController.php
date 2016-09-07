<?php

namespace Application\Controllers\Rest;

use Alien\Rest\BaseRestfulController;
use Application\Models\Cms\Page\Page;
use Application\Models\Cms\Utils\Serializer;
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
        $json = $this->provider->get($id);

        $serializer = new Serializer();
        
        $page = $serializer->fromJson($json);
        $data = $serializer->toJson($page);

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