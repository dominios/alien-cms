<?php

namespace Application\Models\Cms\Utils;

interface Taggable
{
    public function getTags();
    public function setTags(array $tags);
    public function hasTag($tag);
    public function addTag($tag);
    public function removeTag($tag);
    public function flushTags();
}