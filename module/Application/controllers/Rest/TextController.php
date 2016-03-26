<?php

namespace Application\Controllers\Rest;

use Alien\Rest\BaseRestfulController;

class TextController extends BaseRestfulController
{

    public function getAction()
    {
        return $this->dataResponse([
            'id' => 'xcontent',
            'content' => '<h1>Hello World!</h1>'
        ]);
    }

}