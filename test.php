<?php


require __DIR__.'/vendor/autoload.php';

use SRC\model\Image as Image;

$image= new Image();

if (isset($_GET['id'])&&isset($_FILES['image'])){
 $nom="images/".time().$_FILES['image']['name'];

 $image->addimg($nom,$_GET['id']);
 $resultat = move_uploaded_file($_FILES['image']['tmp_name'],$nom);
 if ($resultat) echo "Transfert réussi";

}



 ?>
