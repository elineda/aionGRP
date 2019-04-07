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



}