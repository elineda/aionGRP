<?php
/**
 * Created by PhpStorm.
 * User: henec
 * Date: 02/04/2019
 * Time: 10:08
 */


require __DIR__.'/../../vendor/autoload.php';

use SRC\model\Login as Login;

$login=new Login();





    $ecrit = file_get_contents('php://input');
    $decode=json_decode($ecrit);
    if (! $decode) {
        http_response_code(415);
    }
    elseif (! $decode->user || ! $decode->password) {
        http_response_code(400);
    }
    else {
        $api=$login->login($decode->user,$decode->password);

        header('Content-Type: application/json');
        echo json_encode($api);




    }


