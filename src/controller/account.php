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

    if ($verif==123){
        $ecrit = file_get_contents('php://input');
        $decode=json_decode($ecrit);
        if (! $decode) {
            http_response_code(415);
        }
        elseif (! $decode->user || ! $decode->password) {
            http_response_code(400);
        }
        else {

            $test=$aionDD->login($decode->user, $decode->password);
            if ($test!=false){
                $er=$character->addAccount($test,$_GET['name']);
                $character->import($_GET['name']);
                print_r($er);
            }
            else {
                echo $test;
            }


        }
    }
    else{
        echo $verif;
    }



}
else{
    return "1";
}