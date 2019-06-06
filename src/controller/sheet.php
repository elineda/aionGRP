<?php



require __DIR__.'/../../vendor/autoload.php';


use SRC\model\AionDD as AionDD;
use SRC\model\Login as Login;
use SRC\vue\View as View;

if ($user->data['user_id'] == ANONYMOUS){
   echo '<script>window.location = "https://elineda.ovh/forum/ucp.php?mode=login&redirect=redirect.php"</script>';
}

else{
    $login=new Login();
    $api=$login->login($user->data['username'],$user->data['user_password']);
    $view=new View("Character's sheets");

    $view->addVar('user',$user);
    $view->addBody('sheet');


    $view->showPage();
}


