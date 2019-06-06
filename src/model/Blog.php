<?php
/**
 * Created by PhpStorm.
 * User: henec
 * Date: 02/04/2019
 * Time: 14:37
 */

namespace SRC\model;


class Blog extends DbConnect
{

    public function addBlog($char,$title,$data){
        $bdd=$this->SiteConnect()
            or die('no');
        $req=$bdd->prepare('insert into acc_blog (character_id, title, content) value(:character_id, :title, :content)');
        $req->execute(array("character_id"=>$char,
                            "title"=>$title,
                            "content"=>$data));
        return true;
    }

    public function selectTen($char,$off){
        $bdd=$this->SiteConnect();
        $req=$bdd->prepare('select * from acc_blog where character_id=:character_id order by date_post desc limit 10');
        $req->execute(array("character_id"=>$char));
        $tab=[];
        while ($row=$req->fetch()){
            array_push($tab,$row);
        }
        return $tab;
    }
    public function selectOne($id){
        $bdd=$this->SiteConnect();
        $req=$bdd->prepare('select * from acc_blog where id=:id');
        $req->execute(array("id"=>$id));
        $row=$req->fetch();
        return $row;
    }
    public function modifyBlog($id,$title,$data){
        $bdd=$this->SiteConnect();
        $req=$bdd->prepare('update acc_blog set title=:title, content=:content where id=:id');
        $req->execute(array("title"=>$title,
                            "content"=>$data,
                            "id"=>$id));
        return true;
    }


}
