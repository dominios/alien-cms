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
    
}