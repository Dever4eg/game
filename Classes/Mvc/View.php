<?php

namespace App\Classes;

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
        include __DIR__ . '/../views/' . $template . '.php';
        $content = ob_get_clean();

        if( !empty($layout) )
        {
            ob_start();
            include __DIR__ . '/../views/layouts/' . $layout;
            $content = ob_get_clean();
        }

        return $content;
    }

    public function display($template, $layout = 'main.php')
    {
        echo $this->render($template, $layout);
    }
}