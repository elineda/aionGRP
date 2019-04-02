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



if (isset($_POST['user'])&&isset($_POST['password'])){
    $api=$login->login($_POST['user'],$_POST['password']);

    header('Content-Type: application/json');
    echo json_encode($api);


}
else{
    echo $_POST['user'];
}
