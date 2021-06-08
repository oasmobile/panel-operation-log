<?php

namespace Panel\OperationLog\Storage;

use Doctrine\ORM\EntityManager;
use Panel\OperationLog\Entities\OperationLogInterface;

class OperationLogDbStorage implements OperationLogStorageInterface
{
    /** @var EntityManager */
    private $em;
    
    public function __construct($em)
    {
        $this->em = $em;
    }
    
    public function save(OperationLogInterface $log)
    {
        $this->em->persist($log);
        $this->em->flush($log);
    }
}