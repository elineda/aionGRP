<?php
/**
 * Created by PhpStorm.
 * User: henec
 * Date: 01/04/2019
 * Time: 16:24
 */

namespace SRC\model;


class DbConnect
{
    protected function AionConnect(){
        global $error;
        try{
            $bddaion=new \PDO("mysql:host=[your game host];dbname=[your game table]", 'username', 'pass');
        }
        catch(\PDOException $e){
            $error=$e;
        }
        return $bddaion;
    }
    protected function GameAccountConnect(){
        global $error;
        try{
            $bddgaion=new \PDO("mysql:host=[your game host];dbname=[your game acount table]",'username','pass');
        }
        catch(\PDOException $e){
            $error=$e;
        }
        return $bddgaion;
    }
    protected function SiteConnect(){
        global $error;
        try{
            $bddsite= new \PDO("mysql:host=[your site host];dbname=[your site table]",'username','pass');
        }
        catch (\PDOException $e){
            $error=$e;
        }
        return $bddsite;
    }
}