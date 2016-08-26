<?php

namespace Application\Providers\Base;

interface CRUDInterface
{
    public function get($where);
    public function create($object);
    public function update($object);
    public function delete($object);
    public function exists($object);
}
