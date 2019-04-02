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
    public function verifyAPI($api,$nom){
        $bdd=$this->SiteConnect()
            or die('no');
        $req=$bdd->query('select api from phpbb_users where username='.$nom);
        $row=$req->fetch();
        if ($row['api']===$api){
            return true;
        }
        else{
            return false;
        }
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
        $req=$bdd->query('select * from acc_character where id='.$id);
        $row=$req->fetch();
        return $row;
    }
    public function takeMy($nom){
        $bdd=$this->SiteConnect()
            or die("no");
        $req=$bdd->query('select user_id from phpbb_users where username='.$nom);
        $row=$req->fetch();
        $forumid=$row['user_id'];
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
        $req=$bdd->prepare('select * from acc_character where :type like %:clef%');
        $req->execute(array("type"=>$type,"clef"=>$clef));
        $tab=[];
        while ($row=$req->fetch()){
            array_push($tab,$row);
        }
        return $tab;
    }

}