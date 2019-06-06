<?php
/**
 * Created by PhpStorm.
 * User: henec
 * Date: 02/04/2019
 * Time: 09:43
 */

require __DIR__.'/../../vendor/autoload.php';

use SRC\model\Character as Character;
use SRC\model\AionDD as AionDD;


if (isset($_GET['name'])&&isset($_GET['api'])){

    $character=new Character();
    $aiondd= new AionDD();
    $verif=$character->verifyAPI($_GET['api'],$_GET['name']);
    if ($verif){

        if ($_GET['v']==="takeTen"){
            $tab=$character->takeTen($_GET['off']);
            header('Access-Control-Allow-Origin: *;Content-Type: application/json');
            $test=json_encode($tab);
            echo $test;
        }
        elseif ($_GET['v']==="takeOne"){
            $row=$character->takeOne($_GET['id']);
            header('Content-Type: application/json');
            echo json_encode($row);
        }
        elseif ($_GET['v']==="getID"){
            $row=$character->getID($_GET['name']);
            header('Content-Type: application/json');
            echo json_encode($row);
        }
        elseif ($_GET['v']==="takeAcc"){
            $tab=$character->takeAcc($_GET['name']);
            header('Content-Type: application/json');
            echo json_encode($tab);
        }
        elseif ($_GET['v']==="import"){
            $tab=$character->import($_GET['name']);
            header('Content-Type: application/json');
            echo json_encode($tab);
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
        else if ($_GET['v']==="takeonline"){
            $tab=$aiondd->onlineChar();
            header('Access-Control-Allow-Origin: *;Content-Type: application/json');
            $test=json_encode($tab);
            echo $test;
        }
        else if ($_GET['v']==="verifyismine"){
            $tab=$character->verifyIsMine($_GET['name'],$_GET['idchar']);
            header('Access-Control-Allow-Origin: *;Content-Type: application/json');
            $test=json_encode($tab);
            echo $test;
        }
        elseif ($_GET['v']==="modify"){
            $ecrit = file_get_contents('php://input');
            $decode=json_decode($ecrit);
            if (! $decode) {
                http_response_code(415);
            }
            elseif (! $decode->data || ! $decode->id) {
                http_response_code(400);
            }
            else {
                $test=$character->verifyIsMine($_GET['name'],$decode->id);
                if ($test){

                    $character->modify($decode->id,$decode->data);
                    http_response_code(200);
                }
                else{
                    http_response_code(403);
                }


            }
        }

    }
    else{
        echo false;
    }

}
else{
    echo false;
}