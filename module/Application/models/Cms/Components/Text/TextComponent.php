<?php

namespace Application\Models\Cms\Components\Text;

use Alien\Mvc\Component\ComponentInterface;
use Alien\Mvc\Component\Renderable;
use Alien\Mvc\Template;

class TextComponent implements ComponentInterface {

    protected $content;

    public function baseRender()
    {
        return $this->content;
    }

    public function cmsRender()
    {
        $view = new Template(__DIR__ . '/textComponent.phtml');
        return $view;
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
        return $this->cmsRender();
    }

    public function getName()
    {
        return 'Text';
    }
}