<?php



require __DIR__.'/../../vendor/autoload.php';


use SRC\model\AionDD as AionDD;
use SRC\vue\View as View;

if ($user->data['user_id'] == ANONYMOUS){
   echo '<script>window.location = "http://localhost/forum/ucp.php?mode=login&redirect=redirect.php"</script>';
}

else{
    $view=new View("Character's sheets");

    $view->addVar('user',$user);
    $view->addBody('sheet');


    $view->showPage();
}


