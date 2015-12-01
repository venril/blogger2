<?php

namespace Aston\Logger;

use Aston\Logger\Store\Handler as StoreHandler;
use Exception;

class Logger {

    private $storeHandler;
    private $exception;

    const LEVEL_NOTICE = 1;
    const LEVEL_WARNING = 2;
    const LEVEL_FATAL = 3;

    private $levelTypes = array(
        Logger::LEVEL_NOTICE => 'notice',
        Logger::LEVEL_WARNING => 'warning',
        Logger::LEVEL_FATAL => 'fatal',
    );

    public function __construct(StoreHandler $storeHandler)
    {
        $this->setLogStoreHandler($storeHandler);
    }

    public function log(Exception $e, $level)
    {
        if (!array_key_exists($level, $this->levelTypes)) {
            throw new \InvalidArgumentException('invalid level');
        }
        $this->setException($e);
        $msg = sprintf("[%s];%s;%s;%d;%s;%s;%d\n", 
                $this->levelTypes[$level], $datetime->format('Y-m-d'), $datetime->format('H:i:s'), $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine()
        );
        $this->getStoreHandler()->write($msg);
    }

    public function getStoreHandler()
    {
        return $this->storeHandler;
    }

    public function getException()
    {
        return $this->exception;
    }

    public function setStoreHandler(StoreHandler $storeHandler)
    {
        $this->storeHandler = $storeHandler;
        return $this;
    }

    public function setException(Exception $exception)
    {
        $this->exception = $exception;
        return $this;
    }

}
