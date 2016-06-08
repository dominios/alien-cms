<?php

namespace Application\Models\Cms;

use Alien\Mvc\Component\ComponentInterface;
use Alien\Mvc\Template;

class CmsComponent implements ComponentInterface
{

    public function getName()
    {
        return "cms";
    }

    /**
     * Converts object into string and returns it
     *
     * <b>NOTE</b>: This method is equivalent to standard __toString() call except, this method can throw an exception.
     *
     * @return string
     */
    public function render()
    {
        $helper = new Template(__DIR__ . "/../../views/cms/cms.phtml");
        return $helper;
    }
}