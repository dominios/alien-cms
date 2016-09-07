<?php

namespace Application\Providers\MicroDB;

use Application\Providers\Base\CRUDInterface;
use MicroDB\Database;

class BaseMicroDBAdapter implements CRUDInterface
{

    /**
     * @var Database
     */
    protected $database;

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

    public function delete ($object)
    {
        throw new \RuntimeException("Unsupported operation.");
    }

    public function exists ($id)
    {
        return $this->database->exists($id);
    }
}