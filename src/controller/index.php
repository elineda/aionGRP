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

$aiondd=new AionDD();
$json=$aiondd->onlineChar();

print_r($json);