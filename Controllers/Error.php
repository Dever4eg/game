<?php


namespace Game\Controllers;


use Game\Classes\Mvc\Controller;

class Error extends Controller
{
    public function ActionE404()
    {
        echo '404';
    }
}