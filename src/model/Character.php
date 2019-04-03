<?php
/**
 * Created by PhpStorm.
 * User: henec
 * Date: 02/04/2019
 * Time: 10:54
 */

namespace SRC\model;


class Character extends DbConnect
{
    public function getID($name){
        $bdd=$this->SiteConnect()
        or die("no");
        $req=$bdd->prepare('select user_id from phpbb_users where username=:user');
        $req->execute(array("user"=>$name));
        $row=$req->fetch();
        $forumid=$row['user_id'];
        return $forumid;
    }

    public function verifyAPI($api,$nom){
        $bdd=$this->SiteConnect()
            or die('no');
        $req=$bdd->prepare('select api from phpbb_users where username=:user');
        $req->execute(array("user"=>$nom));
        $row=$req->fetch();
        if ($row['api']===$api){
            return true;
        }
        else{
            return false;
        }
    }

    public function addAccount($idaion,$name){
        $forumid=$this->getID($name);
        $bdd=$this->SiteConnect()
        or die("no");
        $req=$bdd->prepare('insert into acc_acc_for (account_id, forum_id) value (:idaion, :forumid) ');
        $req->execute(array("idaion"=>$idaion,"forumid"=>$forumid));
        return true;
    }

    public function import($name){
        $forumid=$this->getID($name);
        $bdd=$this->SiteConnect();
        $bdd1=$this->AionConnect()
        or die('no');
        $req=$bdd->prepare('select account_id from acc_acc_for where forum_id=:forumid');
        $req->execute(array("forumid"=>$forumid));
        $tab=[];
        while ($row=$req->fetch()){
            $req1=$bdd1->prepare('select * from players where account_id=:id');
            $req1->execute(array("id"=>$row['account_id']));
            while ($row1=$req1->fetch()){
                $req2=$bdd->prepare('select * from acc_character where character_id=:charid');
                $req2->execute(array("charid"=>$row1['id']));
                $row2=$req2->fetch();
                if ($row2==false){
                    $req3=$bdd->prepare('insert into acc_character (character_id, account_id, name, gender, player_class, race, title_id, description, house, id) VALUES (:character_id, :account_id, :name, :gender, :player_class, :race, :title_id, null, null, null)');
                    $req3->execute(array("character_id"=>$row1['id'],
                                        "account_id"=>$row1['account_id'],
                                        "name"=>$row1['name'],
                                        "gender"=>$row1['gender'],
                                        "player_class"=>$row1['player_class'],
                                        "race"=>$row1['race'],
                                        "title_id"=>$row1['title_id']));
                }
                else{
                    $req3=$bdd->prepare('update acc_character set character_id=:character_id, account_id=:account_id, name=:name, gender=:gender, player_class=:player_class, race=:race, title_id=:title_id where character_id=:character_id');
                    $req3->execute(array("character_id"=>$row1['id'],
                        "account_id"=>$row1['account_id'],
                        "name"=>$row1['name'],
                        "gender"=>$row1['gender'],
                        "player_class"=>$row1['player_class'],
                        "race"=>$row1['race'],
                        "title_id"=>$row1['title_id']));
                }
                array_push($tab, $req3);
            }

        }
        return $tab;



    }

    public function takeTen($off){
        $bdd=$this->SiteConnect()
            or die("no");
        $req=$bdd->query('select * from acc_character limit 10 offset '.$off);
        $tab=[];
        while  ($row=$req->fetch()){
            array_push($tab, $row);
        }
        return $tab;
    }
    public function takeOne($id){
        $bdd=$this->SiteConnect()
            or die('no');
        $req=$bdd->query('select * from acc_character where character_id='.$id);
        $row=$req->fetch();
        return $row;
    }
    public function takeMy($nom){
        $bdd=$this->SiteConnect()
            or die("no");
        $forumid=$this->getID($nom);
        $req=$bdd->query('select account_id from acc_acc_for where forum_id='.$forumid);
        $tab=[];
        while ($row=$req->fetch()){
            $acid=$row['account_id'];
            $req1=$bdd->query('select * from acc_character where account_id='.$acid);
            while ($row1=$req1->fetch()){
                array_push($tab,$row1);
            }
        }
        return $tab;
    }
    public function modify($id,$description,$house){
        $bdd=$this->SiteConnect()
            or die('no');
        $req=$bdd->prepare('update acc_character set  description=:description, house=:house where character_id=:id');
        $req->execute(array("description"=>$description,"house"=>$house,"id"=>$id));
        return true;
    }
    public function search($type,$clef){
        $bdd=$this->SiteConnect()
            or die('no');
        $cle='%'.$clef.'%';
        $req=$bdd->prepare('select * from acc_character where name like :clef');
        $req->execute(array("clef"=>$cle));
        $tab=[];
        $row=$req->fetch();
        return $row;
    }

}
