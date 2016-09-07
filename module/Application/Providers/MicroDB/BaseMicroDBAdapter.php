<?php

namespace Application\Providers\MicroDB;

use Application\Providers\Base\CRUDInterface;
use MicroDB\Database;

/**
 * Implements all standard operations with MicroDB support.
 */
class BaseMicroDBAdapter implements CRUDInterface
{

    /**
     * MicroDB database instance.
     * @var Database
     */
    protected $database;

    /**
     * BaseMicroDBAdapter constructor.
     * @param Database $database
     */
    public function __construct (Database $database)
    {
        $this->database = $database;
    }

    public function get ($where)
    {
        return $this->database->load($where);
    }

    public function create ($object)
    {
        $this->database->create($object);
    }

    public function update ($object)
    {
        $this->database->save($object['id'], $object);
    }

    /**
     * Throws an exception.
     * Deletion of object is not possible, change <code>deleted</code> flag to <code>true</code> and <code>update</code> instead.
     * @param mixed $object
     * @throws \RuntimeException always.
     */
    public function delete ($object)
    {
        throw new \RuntimeException("Unsupported operation.");
    }

    public function exists ($id)
    {
        return $this->database->exists($id);
    }
    
}