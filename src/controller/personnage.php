<?php
/**
 * Created by PhpStorm.
 * User: henec
 * Date: 02/04/2019
 * Time: 09:43
 */

require __DIR__.'/../../vendor/autoload.php';

use SRC\model\Character as Character;


if (isset($_GET['name'])&&isset($_GET['api'])){

    $character=new Character();
    $verif=$character->verifyAPI($_GET['api'],$_GET['name']);
    if ($verif){

        if ($_GET['v']==="takeTen"){
            $tab=$character->takeTen($_GET['off']);
            header('Content-Type: application/json');
            echo json_encode($tab);
        }
        elseif ($_GET['v']==="takeOne"){
            $row=$character->takeOne($_GET['id']);
            header('Content-Type: application/json');
            echo json_encode($row);
        }
        elseif ($_GET['v']==="takeMy"){
            $tab=$character->takeMy($_GET['name']);
            header('Content-Type: application/json');
            echo json_encode($tab);
        }
        elseif ($_GET['v']==="search"){
            $tab=$character->search($_GET['type'],$_GET['clef']);
            header('Content-Type: application/json');
            echo json_encode($tab);
        }
        elseif ($_GET['v']==="modify"){
            $ecrit = file_get_contents('php://input');
            $decode=json_decode($ecrit);
            if (! $decode) {
                http_response_code(415);
            }
            elseif (! $decode->description || ! $decode->house || ! $decode->id) {
                http_response_code(400);
            }
            else {

                $character->modify($decode->id,$decode->description,$decode->house);
                http_response_code(200);


            }
        }

    }
    else{
        return false;
    }

}
else{
    return false;;
}