<?php

namespace Application\Models\Utils;

/**
 * Interface for adding tagging (labels) feature.
 */
interface Taggable
{

    /**
     * Returns all associated tags.
     * @return string[] tags.
     */
    public function getTags();

    /**
     * Sets object tags.
     * @param string[] $tags array of tags.
     * @return void
     */
    public function setTags(array $tags);

    /**
     * Checks if object has given tag.
     * @param string $tag needle.
     * @return bool returns <code>true</code> if object has given tag, otherwise <code>false</code>.
     */
    public function hasTag($tag);

    /**
     * Adds given tag to object.
     * @param string $tag tag to add.
     * @return void
     */
    public function addTag($tag);

    /**
     * Removes given tag from the object.
     * @param string $tag
     * @return void
     */
    public function removeTag($tag);

    /**
     * Removes all associated tags.
     * @return void
     */
    public function flushTags();
}