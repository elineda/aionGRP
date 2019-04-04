<?php


$nom="test.png";


$resultat = move_uploaded_file($_FILES['image']['tmp_name'],$nom);
if ($resultat) echo "Transfert réussi";
 ?>
