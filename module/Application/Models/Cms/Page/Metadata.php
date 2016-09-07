<?php

namespace Application\Models\Cms\Page;

class Metadata extends \Application\Models\Cms\Utils\Metadata
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $author;

    /**
     * @var string
     */
    protected $status;

    /**
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

    /**
     * @return string[]
     */
    public function getTags ()
    {
        return $this->tags;
    }

    /**
     * @param string[] $tags
     */
    public function setTags ($tags)
    {
        $this->tags = $tags;
    }


}