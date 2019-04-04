<?php
/**
 * Created by PhpStorm.
 * User: henec
 * Date: 01/04/2019
 * Time: 19:34
 */

namespace SRC\model;


use function PHPSTORM_META\elementType;

class AionDD extends DbConnect
{
    /**
     * @param $id
     * @return @tabchar
     */
    public function getPlayerId($id){
        $bdd=$this->AionConnect()
            or die("rapé");
        $req=$bdd->prepare('select * from players where account_id=:id');
        $req->execute(array("id"=>$id));
        $tabchar=[];
        while ($row=$req->fetch()){
            array_push($tabchar,$row);
        }
        return $tabchar;
    }

    /**
     * @param $name
     * @param $pass
     * @return string
     */
    public function login($name,$pass){
        $bdd=$this->GameAccountConnect()
            or die("error");
        $req=$bdd->prepare('select id, name, password from account_data where name=:name');
        $req->execute(array("name"=>$name));
        $hash= base64_encode(sha1($pass, true));
        $row=$req->fetch();
        if ($row['password']==$hash){
            return $row['id'];
        }
        else{
            return false;
        }
    }

    /**
     * @return array
     */
    public function onlineChar(){
        $bdd=$this->AionConnect()
            or die('rapé');
        $req=$bdd->query('select name, world_id, gender, race, player_class from players where online="1"');
        $tabchar=[];
        while($row=$req->fetch()){
            require 'translation.php';
            array_push($tabchar,$row);

        }

        return $tabchar;
    }



}