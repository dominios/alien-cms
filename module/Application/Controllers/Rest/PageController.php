<?php

namespace Application\Controllers\Rest;

use Alien\Mvc\AbstractController;
use Alien\Rest\BaseRestfulController;
use Application\Models\Utils\Serializer;
use Application\Providers\Page\PageProvider;

class PageController extends RestController
{

    /**
     * @var PageProvider
     */
    protected $provider;

    /**
     * @var Serializer
     */
    protected $serializer;

    public function __construct (PageProvider $provider)
    {
        parent::__construct();
        $this->provider = $provider;

        $this->serializer = new Serializer();
    }

    public function getAction ($id)
    {
        if (!$this->provider->exists(1)) {
            $json = $this->provider->getDefault();
             $this->provider->create($json);
        } else {
            $id = $this->getRequest()->getParam('id');
            $json = $this->provider->get($id);
        }

        $page = $this->serializer->fromJson($json);
        $json = $this->serializer->toJson($page);

        return $this->dataResponse($json);
    }

    public function patchAction ()
    {
        $fileContent = $this->getRequest()->getContent();
        $json = json_decode($fileContent, true);
        $this->provider->update($json);
        return $this->successResponse();
    }

}