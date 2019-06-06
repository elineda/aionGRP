<?php
/**
 * Created by PhpStorm.
 * User: henec
 * Date: 02/04/2019
 * Time: 12:14
 */

require __DIR__.'/../../vendor/autoload.php';

use SRC\model\Character as Character;

use SRC\model\AionDD as AionDD;

if (isset($_GET['name'])&&isset($_GET['api'])){

    $aionDD=new AionDD();
    $character=new Character();
    $verif=$character->verifyAPI($_GET['api'],$_GET['name']);

    if ($verif){

        $char=$aionDD->getPlayerId($_GET['id']);
        header('Content-Type: application/json');
        echo json_encode($char);
    }

    else{
        return false;
    }


}
else{
    return "1";
}