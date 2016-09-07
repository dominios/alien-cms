<?php

namespace Application\Providers\Base;

/**
 * Parent of all providers.
 * Wraps given <code>$adapter</code> and works as a proxy.
 */
abstract class AbstractProvider implements CRUDInterface
{
    
    /**
     * CRUD implementation adapter.
     * @var CRUDInterface
     */
    private $adapter;

    /**
     * AbstractProvider constructor.
     * @param CRUDInterface $adapter adapter to use.
     */
    public function __construct (CRUDInterface $adapter)
    {
        $this->setAdapter($adapter);
    }

    /**
     * @inheritdoc
     */
    public function setAdapter (CRUDInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @inheritdoc
     */
    public function get ($where)
    {
        return $this->adapter->get($where);
    }

    /**
     * @inheritdoc
     */
    public function create ($object)
    {
        $this->adapter->create($object);
    }

    /**
     * @inheritdoc
     */
    public function update ($object)
    {
        $this->adapter->update($object);
    }

    /**
     * @inheritdoc
     */
    public function delete ($object)
    {
        $this->adapter->delete($object);
    }

    /**
     * @inheritdoc
     */
    public function exists ($object)
    {
        return $this->adapter->exists($object);
    }
}