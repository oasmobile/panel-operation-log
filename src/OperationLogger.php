<?php

namespace Panel\OperationLog;

use InvalidArgumentException;
use Panel\OperationLog\Entities\OperationLogInterface;
use Panel\OperationLog\Storage\OperationLogLocalFileStorage;

class OperationLogger
{
    /**
     * @var OperationLogStorageInterface[]
     */
    private $storages;
    
    /**
     * @var OperationLogInterface
     */
    private $logEntity = null;
    
    public function __construct($logStorages = [])
    {
        if (count($logStorages) == 0) {
            $logStorages = [new OperationLogLocalFileStorage()];
        }
        
        $this->setStorages($logStorages);
    }
    
    public function newLog($logEntity)
    {
        if (!$logEntity instanceof OperationLogInterface) {
            throw new InvalidArgumentException("Only OperationLogInterface object can be chained.");
        }
        $this->logEntity = $logEntity;
    }
    
    public function pushStorage($storage)
    {
        array_push($this->storages, $storage);
    }
    
    /**
     * @param OperationLogInterface $operationLog
     *
     * @return bool
     */
    protected function save(OperationLogInterface $operationLog)
    {
        foreach ($this->storages as $logStorage) {
            $logStorage->save($operationLog);
        }
        
        return true;
    }
    
    public function write($logEntity = null)
    {
        if ($logEntity) {
            if (!$logEntity instanceof OperationLogInterface) {
                throw new InvalidArgumentException("Only OperationLogInterface object can be chained.");
            }
            
            return $this->save($logEntity);
        }
        
        return $this->save($this->logEntity);
        
    }
    
    /**
     * @return OperationLogInterface
     */
    public function getLogEntity(): ?OperationLogInterface
    {
        return $this->logEntity;
    }
    
    /**
     * @return OperationLogStorageInterface[]
     */
    public function getStorages(): array
    {
        return $this->storages;
    }
    
    public function setStorages($logStorages)
    {
        $this->storages = [];
        foreach ($logStorages as $logStorage) {
            $this->pushStorage($logStorage);
        }
    }
}