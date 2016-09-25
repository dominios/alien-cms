<?php

namespace Application\Models\Page;

use Application\Models\Utils\Identified;
use Application\Models\Utils\JsonInterface;

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

    /**
     * Type of the object.
     * Should always match PHP class name.
     * @var String
     */
    protected $type;

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
     * Returns page metadata.
     * @return Metadata
     */
    public function getMeta ()
    {
        return $this->meta;
    }

    /**
     * Returns page body.
     * @return Body
     */
    public function getBody ()
    {
        return $this->body;
    }

}