<?php

namespace Application\Models\Cms\Page;

use Application\Models\Cms\Utils\Taggable;

/**
 * Page Metadata model.
 */
class Metadata extends \Application\Models\Cms\Utils\Metadata implements Taggable
{
    /**
     * Page URL.
     * @var string
     */
    protected $url;

    /**
     * Author of the page.
     * @var string
     */
    protected $author;

    /**
     * Status of page.
     * @var string
     */
    protected $status;

    /**
     * Associated labels.
     * @var string[]
     */
    protected $tags;
    
    /**
     * @return string
     */
    public function getUrl ()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl ($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getAuthor ()
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor ($author)
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getStatus ()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus ($status)
    {
        $this->status = $status;
    }

    public function getTags ()
    {
        return $this->tags;
    }

    public function setTags (array $tags)
    {
        $this->tags = $tags;
    }

    public function hasTag ($tag)
    {
        return in_array($tag, $this->tags);
    }

    public function addTag ($tag)
    {
        $this->tags[] = $tag;
    }

    public function removeTag ($tag)
    {
        $this->tags = array_diff($this->tags, [$tag]);
    }

    public function flushTags ()
    {
        $this->tags = [];
    }
    
}