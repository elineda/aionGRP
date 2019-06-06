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
        $bdd=$this->SiteConnect()
            or die('no');
        $req=$bdd->prepare('select * from acc_img where id=:id');
        $req->execute(array("id"=>$id));
        $row=$req->fetch();
        return $row;
    }
    public function remove($id){
        $bdd=$this->SiteConnect()
            or die('no');
        $req=$bdd->prepare( 'delete from acc_img where id=:id');
        $req->execute(array("id"=>$id));
        return true;
    }
    public function makedefault($idchar,$idimg){
        $bdd=$this->SiteConnect();
        $req=$bdd->prepare('select * from acc_img where id=:id');
        $req->execute(array("id"=>$idimg));
        $row=$req->fetch();
        $pathimage=$row['img_path'];
        $req=$bdd->prepare('update acc_character set imgdef=:idimg where character_id=:idchar ');
        $req->execute(array("idimg"=>$pathimage,"idchar"=>$idchar));
        return true;
    }


}
