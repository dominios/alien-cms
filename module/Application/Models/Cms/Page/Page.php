<?php

namespace Application\Models\Cms\Page;

use Application\Models\Cms\Utils\Identified;
use Application\Models\Cms\Utils\JsonInterface;

/**
 * Page data model.
 */
class Page implements Identified, JsonInterface
{

    /**
     * Page ID.
     * @var int
     */
    protected $id;

    /**
     * Metadata section.
     * @var Metadata
     */
    protected $meta;

    /**
     * Body section.
     * @var Body
     */
    protected $body;

//    protected $versioning;
//
//    protected $localization;
//
//    protected $template;

    /**
     * @inheritdoc
     */
    public function getId ()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function setId ($id)
    {
        $this->id = $id;
    }

    /**
     * Returns page metadata.
     * @return Metadata
     */
    public function getMeta ()
    {
        return $this->meta;
    }

    /**
     * Sets page metadata.
     * @param Metadata $meta
     */
    public function setMeta ($meta)
    {
        $this->meta = $meta;
    }

    /**
     * Returns page body.
     * @return Body
     */
    public function getBody ()
    {
        return $this->body;
    }

    /**
     * Sets page body/
     * @param Body $body
     */
    public function setBody ($body)
    {
        $this->body = $body;
    }

}