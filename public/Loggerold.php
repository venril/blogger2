<?php

class Logger {

    private $filelogger;
    private $separator;
    private $warningType;
    private $date;
    private $hour;
    private $mess;
    private $redirect;
    private $errorcode;
    
    const LEVEL_NOTICE = 1;
    const LEVEL_WARNING = 2;
    const LEVEL_FATAL = 3;
    
    private $levelTypes = array(
      Logger::LEVEL_NOTICE => 'notice',
      Logger::LEVEL_WARNING => 'warning',
      Logger::LEVEL_FATAL => 'fatal',
    );


    public function getFilelogger()
    {
        return $this->filelogger;
    }

    public function getSeparator()
    {
        return $this->separator;
    }

    public function getWarningType()
    {
        return $this->warningType;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getHour()
    {
        return $this->hour;
    }

    public function getMess()
    {
        return $this->mess;
    }

    public function getRedirect()
    {
        return $this->redirect;
    }

    public function getErrorcode()
    {
        return $this->errorcode;
    }

    public function setFilelogger($filelogger)
    {
        $this->filelogger = (string) $filelogger;
        return $this;
    }

    public function setSeparator($separator)
    {
        $this->separator = (string) $separator;
        return $this;
    }

    public function setWarningType($warningType)
    {
        $this->warningType = $warningType;
        return $this;
    }

    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    public function setHour($hour)
    {
        $this->hour = $hour;
        return $this;
    }

    public function setMess($mess)
    {
        $this->mess = (string)$mess;
        return $this;
    }

    public function setRedirect($redirect)
    {
        $this->redirect = $redirect;
        return $this;
    }

    public function setErrorcode($errorcode)
    {
        $this->errorcode = $errorcode;
        return $this;
    }

        public function __construct(
    file $filelogger, $separator, $warningType, $date, $hour,$errorcode, $mess, $redirect)
    {
        $this->setFilelogger($filelogger)
             ->setSeparator($separator)
             ->setWarningType($warningType)
             ->setDate($date)
             ->setHour($hour)
             ->setMess($mess)            
             ->setRedirect($redirect)
             ->setErrorcode($errorcode);
    }
// Logger
// 2015-11-30 00:00:00
// type date time code message fichier ligne
// 
// [warning] ;2015-11-30 ; 00:00:00 ; 500 ; Argument non valide ; test.php 56
// [notice]  ;2015-11-30 ; 00:00:00 ; 404 ; internal error      ; test.php 56
// [fatal]   ;2015-11-30 ; 00:00:00 ; 500 ; internal error      ;test.php 56
// [warning] ;2015-11-30 ; 00:00:00 ; 403 ; internal error      ; test.php 56
    public function fillLog(Logger $logger)
    {
        $separator = $logger->getSeparator();
        // Ajoute une personne
        $lignesupp .= $logger->getWarningType() . $separator;
        $lignesupp .= $logger->getDate() . $separator;
        $lignesupp .= $logger->getHour() . $separator;
        $fignesupp .= $logger->getErrorcode() . $separator;
        $lignesupp .= $logger->getMess() . $separator;
        $lignesupp .= $logger->getRedirect();
// Écrit le résultat dans le fichier
        file_put_contents($filelogger, $lignesupp, FILE_APPEND);
    }

}
