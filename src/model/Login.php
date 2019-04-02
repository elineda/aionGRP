<?php
/**
 * Created by PhpStorm.
 * User: henec
 * Date: 02/04/2019
 * Time: 09:44
 */

namespace SRC\model;


class Login extends DbConnect
{

    public function login($user, $password){

        $bdd=$this->SiteConnect()
            or die("nuhuhu");
        $req=$bdd->prepare('select * from phpbb_users where username=:user');
        $req->execute(array("user"=>$user));
        $row=$req->fetch();
        if ($password==$row['user_password']){
            if ($row['api']==null){
                //let's create token
                $api=$row['username'].$row['user_password'];
                $api=base64_encode(sha1($api,true));
                $req2=$bdd->prepare('update phpbb_users set api=:api where username=:user');
                $req2->execute(array("api"=>$api,"user"=>$user));
                return $api;
            }
            else{
                return $row['api'];
            }
        }
        else{
            return false;
        }

    }


}