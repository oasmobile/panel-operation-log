<?php

namespace Panel\OperationLog;

class OperationLogLocalFileStorage implements OperationLogStorageInterface
{
    private $logDir;
    
    public function __construct($logDir = null)
    {
        if ($logDir == null) {
            $logDir = '/tmp';
        }
        $this->logDir = $logDir;
    }
    
    public function save(OperationLogInterface $log)
    {
        file_put_contents($this->getLogFile(), sprintf("%s\n", json_encode($log)), FILE_APPEND);
        
    }
    
    private function getLogFile(): string
    {
        return sprintf("%s/operation-log-%s.log", $this->logDir, date('Ymd'));
    }
}