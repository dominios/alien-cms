<?php

namespace Application\Providers\Base;

abstract class AbstractProvider implements CRUDInterface
{
    
    /**
     * @var CRUDInterface
     */
    private $adapter;

    public function __construct (CRUDInterface $adapter)
    {
        $this->setAdapter($adapter);
    }

    public function setAdapter (CRUDInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    public function get ($where)
    {
        return $this->adapter->get($where);
    }

    public function create ($object)
    {
        return $this->adapter->create($object);
    }

    public function update ($object)
    {
        return $this->adapter->update($object);
    }

    public function delete ($object)
    {
        return $this->adapter->delete($object);
    }

    public function exists ($object)
    {
        return $this->adapter->exists($object);
    }
}