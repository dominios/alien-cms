<?php

namespace Application\Models\Cms;

class Cms
{

    protected $header;

    public function __construct()
    {
        $this->header = new CmsComponent();
    }

    public function getHeader()
    {
        return $this->header;
    }

}