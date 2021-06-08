<?php

namespace Panel\OperationLog\Factory;

use Panel\OperationLog\Entities\OperationLogInterface;

abstract class  AbstractOperationLogFactory
{
    /**
     * @param mixed ...$args
     *
     * @return OperationLogInterface
     */
    abstract public static function createOperationLog(...$args): OperationLogInterface;
}