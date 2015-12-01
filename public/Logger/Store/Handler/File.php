<?php

namespace Aston\Logger\Store\Handler;

class File implements \Aston\Logger\Store\Handler {
    private $filename;
    
    
    public function __construct($filename)
    {
        $this->filename = (string) $filename;
    }


    public function  write($data){
        echo $data;
        file_put_contents($this->$filename, $data,FILE_APPEND);
    }
}

