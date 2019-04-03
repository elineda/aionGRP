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





<<<<<<< HEAD
  if (isset($_GET['name'])&&isset($_GET['password'])) {
    $api=$login->login($_GET['name'],$_GET['password']);

    header('Content-Type: application/json');
    echo json_encode($api);
  }
=======

        $api=$login->login($_GET['name'],$_GET['password']);

        header('Content-Type: application/json');
        echo json_encode($api);




>>>>>>> d3b2f07f5507f618a452ee251111535ee218016a
