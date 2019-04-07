<?php



require __DIR__.'/../../vendor/autoload.php';


use SRC\model\AionDD as AionDD;


$aiondd=new AionDD();

if ($_GET['v']==="takeonline"){
$tab=$aiondd->onlineChar();
header('Content-Type: application/json');
$test=json_encode($tab);
echo $test;
}

//[{"name":"Ellice","0":"Ellice","world_id":"Sanctum","1":"110010000","gender":"FEMALE","2":"FEMALE","race":"ELYOS","3":"ELYOS","player_class":"TEMPLAR","4":"TEMPLAR"},{"name":"Ellineda","0":"Ellineda","world_id":"Akaron","1":"600100000","gender":"FEMALE","2":"FEMALE","race":"ASMODIANS","3":"ASMODIANS","player_class":"SORCERER","4":"SORCERER"}]