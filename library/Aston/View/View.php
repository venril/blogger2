<?php

namespace Aston\View;

abstract class View{
 
    private $path;
    
    public function __construct($path)
    {
        $this->setPath($path);
        if (is_dir($this->getPath())){
            throw new \Exception(
                    'ErrorPath :"'.$this->getPath().'"not found"');
        }
    }


    public function getPath()
    {
        return $this->path;
    }

    public function setPath($path)
    {
        $this->path = (string)$path;
        return $this;
    }
    abstract function render($view, array $data = []);

    
}
