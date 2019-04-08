<?php


namespace SRC\model;


class Image extends DbConnect
{

    public function addimg($image,$idchar){
        $bdd=$this->SiteConnect()
            or die('no');
        $req=$bdd->prepare('insert into acc_img (character_id, img_path) value (:idchar, :image)');
        $req->execute(array("idchar"=>$idchar,"image"=>$image));
        return true;

    }
    public function showAll($idchar){
      $bdd=$this->SiteConnect()
        or die('no');
      $req=$bdd->prepare('SELECT * FROM acc_img WHERE character_id=:idchar ORDER BY id');
      $req->execute(array("idchar"=>$idchar));
      $tab=[];
      while ($row=$req->fetch()){
        array_push($tab,$row);
      }
      return $tab;
    }
    public function  showOne($id){

    }


}
