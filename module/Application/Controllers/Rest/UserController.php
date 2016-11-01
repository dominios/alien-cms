<?php

namespace Application\Controllers\Rest;

class UserController extends RestController
{

    public function getAction()
    {
        return $this->dataResponse([
            'name' => 'Dominik',
            'role' => 'Administrator'
        ]);
    }

}