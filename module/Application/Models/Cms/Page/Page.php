<?php

namespace Application\Models\Cms\Page;

use Application\Models\Cms\Utils\Identified;
use Application\Models\Cms\Utils\JsonInterface;

class Page implements Identified, JsonInterface
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var Metadata common metadata structure
     */
    protected $meta;

    /**
     * @var Body
     */
    protected $body;

//    protected $versioning;
//
//    protected $localization;
//
//    protected $template;

    public function getId ()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId ($id)
    {
        $this->id = $id;
    }

    /**
     * @return Metadata
     */
    public function getMeta ()
    {
        return $this->meta;
    }

    /**
     * @param Metadata $meta
     */
    public function setMeta ($meta)
    {
        $this->meta = $meta;
    }

    /**
     * @return Body
     */
    public function getBody ()
    {
        return $this->body;
    }

    /**
     * @param Body $body
     */
    public function setBody ($body)
    {
        $this->body = $body;
    }

}