<?php
/**
 * Created by PhpStorm.
 * User: henec
 * Date: 01/04/2019
 * Time: 16:14
 */


require __DIR__.'/../../vendor/autoload.php';


use SRC\model\Index as Index;

use SRC\model\AionDD as AionDD;


use SRC\vue\View as View;

$view=new View('Index');

$view->addVar('pass',$user->data['user_password']);
$view->addVar('user',$user->data['username']);
$view->addBody('test');
//print_r($view->var);

$view->showPage();