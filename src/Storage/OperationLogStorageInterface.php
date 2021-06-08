<?php

namespace Panel\OperationLog\Storage;

use Panel\OperationLog\Entities\OperationLogInterface;

interface OperationLogStorageInterface
{
    /**
     * @param OperationLogInterface
     *
     * @return mixed
     */
    public function save(OperationLogInterface $log);
}