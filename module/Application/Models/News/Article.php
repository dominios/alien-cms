<?php

namespace Application\Models\News;

use Application\Models\Utils\Identified;
use Application\Models\Utils\JsonInterface;

class Article implements Identified, JsonInterface
{

    /**
     * Article ID.
     * @var string
     */
    protected $id;

    /**
     * Metadata section.
     * @var Metadata
     */
    protected $meta;

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

}