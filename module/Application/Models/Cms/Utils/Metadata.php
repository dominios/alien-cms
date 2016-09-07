<?php

namespace Application\Models\Cms\Utils;

class Metadata implements JsonInterface
{

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string[]
     */
    protected $tags;

    /**
     * @var \DateTime
     */
    protected $dateCreated;

    /**
     * @var \DateTime
     */
    protected $dateModified;

    /**
     * @var bool
     */
    protected $deleted;

    /**
     * @return string
     */
    public function getType ()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType ($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getName ()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName ($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription ()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription ($description)
    {
        $this->description = $description;
    }

    /**
     * @return \string[]
     */
    public function getTags ()
    {
        return $this->tags;
    }

    /**
     * @param \string[] $tags
     */
    public function setTags ($tags)
    {
        $this->tags = $tags ;
    }

    /**
     * @return \DateTime
     */
    public function getDateCreated ()
    {
        return $this->dateCreated;
    }

    /**
     * @param \DateTime $dateCreated
     */
    public function setDateCreated ($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    /**
     * @return \DateTime
     */
    public function getDateModified ()
    {
        return $this->dateModified;
    }

    /**
     * @param \DateTime $dateModified
     */
    public function setDateModified ($dateModified)
    {
        $this->dateModified = $dateModified;
    }

    /**
     * @return boolean
     */
    public function isDeleted ()
    {
        return $this->deleted;
    }

    /**
     * @param boolean $deleted
     */
    public function setDeleted ($deleted)
    {
        $this->deleted = $deleted;
    }
    
}