<?php

namespace Application\Models\Utils;

/**
 * Base Metadata structure same for all entities.
 * Each entity should use this metadata or extend them.
 */
class Metadata implements JsonInterface
{

    /**
     * Type of the object (full classified class name).
     * @var string
     */
    protected $type;

    /**
     * Name of the object.
     * @var string
     */
    protected $name;

    /**
     * Short description of the object.
     * @var string
     */
    protected $description;
    
    /**
     * Date when the object was created.
     * @var \DateTime
     */
    protected $dateCreated;

    /**
     * Date when the object was last modified.
     * @var \DateTime
     */
    protected $dateModified;

    /**
     * Flag if object has been deleted.
     * @var bool
     */
    protected $deleted;

    /**
     * Returns type of the object.
     * @return string
     */
    public function getType ()
    {
        return $this->type;
    }

    /**
     * Sets type of the object.
     * @param string $type
     */
    public function setType ($type)
    {
        $this->type = $type;
    }

    /**
     * Returns name of the object.
     * @return string
     */
    public function getName ()
    {
        return $this->name;
    }

    /**
     * Sets name of the object.
     * @param string $name
     */
    public function setName ($name)
    {
        $this->name = $name;
    }

    /**
     * Returns description of the object.
     * @return string
     */
    public function getDescription ()
    {
        return $this->description;
    }

    /**
     * Sets the description of the object.
     * @param string $description
     */
    public function setDescription ($description)
    {
        $this->description = $description;
    }

    /**
     * Returns when the object was created.
     * @return \DateTime
     */
    public function getDateCreated ()
    {
        return $this->dateCreated;
    }

    /**
     * Sets date when the object was created.
     * @param \DateTime $dateCreated
     * @internal dateCreated should be readonly, this method is used only during serialization.
     * 
     */
    public function setDateCreated ($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    /**
     * Returns date when the object was last modified.
     * @return \DateTime
     */
    public function getDateModified ()
    {
        return $this->dateModified;
    }

    /**
     * Sets date of last modify to given date.
     * @param \DateTime $dateModified
     */
    public function setDateModified ($dateModified)
    {
        $this->dateModified = $dateModified;
    }

    /**
     * Returns if object is flagged as deleted.
     * @return boolean
     */
    public function isDeleted ()
    {
        return $this->deleted;
    }

    /**
     * Sets deleted flag.
     * @param boolean $deleted
     */
    public function setDeleted ($deleted)
    {
        $this->deleted = $deleted;
    }
    
}