<?php

namespace Panel\OperationLog;

interface OperationLogStorageInterface
{
    /**
     * @param OperationLogInterface
     *
     * @return mixed
     */
    public function save(OperationLogInterface $log);
}