<?php
/**
 * Created by PhpStorm.
 * User: henec
 * Date: 02/04/2019
 * Time: 10:12
 */


if (isset($_GET['w'])){
    include __DIR__ . '/src/controller/'.$_GET['w'].'.php';
}
else{
    include __DIR__ . '/src/controller/index.php';
}