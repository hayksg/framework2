<?php

namespace Application\Components;

class View 
{
    const VIEW_PATH = ROOT . 'Application/View/';
    private $data = [];
    
    public function __construct(array $viewValues)
    {
        foreach ($viewValues as $key => $value) {
            $this->data[$key] = $value;
        }
    }
    
    public function display($template)
    {
        foreach ($this->data as $key => $value) {
            $$key = $value;
        }
        
        $path = self::VIEW_PATH . $template . '.phtml';
        
        if (file_exists($path)) {
            include_once($path);
        }
    }
}
