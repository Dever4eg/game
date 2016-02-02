<?php

namespace Dever4eg\Classes\Mvc;

use Dever4eg\Classes\http\E404Exception;

class View
{
    protected $data = [];

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    protected function render($template, $layout)
    {
        foreach($this->data as $key => $val)
        {
            $$key = $val;
        }

        ob_start();

        if( !file_exists(__DIR__ . '/../../views/' . $template . '.php') )
            throw new E404Exception();
        require __DIR__ . '/../../views/' . $template . '.php';

        $content = ob_get_clean();

        if( !empty($layout) )
        {
            ob_start();
            require __DIR__ . '/../../Views/layouts/' . $layout;
            $content = ob_get_clean();
        }

        return $content;
    }

    public function display($template, $layout = 'main.php')
    {
        echo $this->render($template, $layout);
    }
}