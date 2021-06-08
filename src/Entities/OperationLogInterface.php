<?php

namespace Panel\OperationLog\Entities;

use JsonSerializable;

interface OperationLogInterface extends JsonSerializable
{
    public function logDescription($message, ...$args): OperationLogInterface;
    
    public function logKey($key): OperationLogInterface;
    
    public function setCreatedAt($time): OperationLogInterface;
    
    public function setIp($ip): OperationLogInterface;
    
    public function setOperator($operatorId = 0, $operatorName = ''): OperationLogInterface;
}