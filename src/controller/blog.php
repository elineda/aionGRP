<?php
/**
 * Created by PhpStorm.
 * User: henec
 * Date: 02/04/2019
 * Time: 15:16
 */


require __DIR__.'/../../vendor/autoload.php';


use SRC\model\Blog as Blog;
use SRC\model\Character as Character;
use SRC\model\Image as Image;


if (isset($_GET['name'])&&isset($_GET['api'])){
    $blog=new Blog();
    $character=new Character();
    $image=new Image();
    $verif=$character->verifyAPI($_GET['api'],$_GET['name']);

    if ($verif){

        if ($_GET['v']=="selectTen"){
            $tab=$blog->selectTen($_GET['idchar'],$_GET['off']);
            header('Content-Type: application/json');
            echo json_encode($tab);
        }
        elseif ($_GET['v']=="selectOne"){
            $row=$blog->selectOne($_GET['idblog']);
            header('Content-Type: application/json');
            echo json_encode($row);
        }
        elseif ($_GET['v']=="imgtakeall"){
            $tab=$image->showAll($_GET['idchar']);
            header('Content-Type: application/json');
            echo json_encode($tab);
        }
        elseif ($_GET['v']=="imgtakeone"){
            $tab=$image->showOne($_GET['id']);
            header('Content-Type: application/json');
            echo json_encode($tab);
        }
        elseif ($_GET['v']=="imgremove"){
            $tab=$image->remove($_GET['id']);
            header('Content-Type: application/json');
            echo json_encode($tab);
        }
        elseif ($_GET['v']=="imgsend"){


            if (isset($_GET['id'])&&isset($_FILES['image'])){
                $nom="images/".time().$_FILES['image']['name'];

                $image->addimg($nom,$_GET['id']);
                $resultat = move_uploaded_file($_FILES['image']['tmp_name'],$nom);
                if ($resultat) echo "Transfert réussi";

            }
        }
        elseif ($_GET['v']=="addBlog"){

            $ecrit = file_get_contents('php://input');
            $decode=json_decode($ecrit);
            if (! $decode) {
                http_response_code(415);
            }
            elseif (! $decode->title || ! $decode->data) {
                http_response_code(400);
            }
            else {

                $row=$blog->addBlog($_GET['idchar'],$decode->title,$decode->data);
                http_response_code(200);

            }

        }
        elseif ($_GET['v']=="modifyBlog"){

            $ecrit = file_get_contents('php://input');
            $decode=json_decode($ecrit);
            if (! $decode) {
                http_response_code(415);
            }
            elseif (! $decode->title || ! $decode->data) {
                http_response_code(400);
            }
            else {

                $row=$blog->modifyBlog($_GET['idblog'],$decode->title,$decode->data);
                http_response_code(200);

            }

        }



    }
    else{
        http_response_code(403);
    }

}
else{
    http_response_code(403);
}
