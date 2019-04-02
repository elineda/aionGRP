<?php
/**
 * Created by PhpStorm.
 * User: henec
 * Date: 01/04/2019
 * Time: 16:08
 */

namespace SRC\vue;


class View
{
    public $title;
    public $body;
    public $var=[];

    public function __construct($title)
    {
        $this->title=$title;
    }

    public function addBody($body){
        ob_start();
        include $body.'.php';
        $this->body=ob_get_contents();
        ob_clean();
    }
    public function showPage(){
        require 'page.php';
    }
    public function addVar($name,$meh){
        array_push($this->var,$meh);
    }

}