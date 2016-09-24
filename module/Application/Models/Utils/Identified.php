<?php

namespace Application\Models\Utils;

/**
 * Interface for defining entities with unique ID.
 */
interface Identified {

    /**
     * Returns entity ID.
     * @return string
     */
    public function getId();

    /**
     * Sets entity ID.
     * @param string $id
     * @return void
     * @internal ID should be readonly, never use this method outside of serialization process.
     */
    public function setId($id);
}