<?php

require __DIR__.'/../../vendor/autoload.php';


use SRC\model\AionDD as AionDD;
use SRC\vue\View as View;


$aiondd=new AionDD();


$tab=$aiondd->onlineChar();

$view=new View('Player Map');

$view->addVar('tab',$tab);

$view->addBody('map');



$view->showPage();