<?php

namespace Panel\OperationLog;

abstract class  AbstractOperationLogFactory
{
    /**
     * @param mixed ...$args
     *
     * @return OperationLogInterface
     */
    abstract public static function createOperationLog(...$args): OperationLogInterface;
}