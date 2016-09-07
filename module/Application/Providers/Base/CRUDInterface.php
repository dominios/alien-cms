<?php

namespace Application\Providers\Base;

/**
 * Interface for basic CRUD operations.
 * Create
 * Read (get)
 * Update
 * Delete
 */
interface CRUDInterface
{
    /**
     * Returns object based on given condition.
     * @param mixed $where condition.
     * @return mixed object instance.
     */
    public function get($where);

    /**
     * Saves new object to storage and gives it new ID.
     * @param mixed $object object to store.
     * @return void
     */
    public function create($object);

    /**
     * Saves already existing object in storage.
     * @param mixed $object object to update.
     * @return void
     */
    public function update($object);

    /**
     * Deletes object from the storage.
     * @param mixed $object object to delete.
     * @return void
     */
    public function delete($object);

    /**
     * Checks if given object already exists.
     * @param mixed $object object to test.
     * @return bool
     */
    public function exists($object);

}
