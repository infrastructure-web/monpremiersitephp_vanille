<?php
  //include_once "include/config.php";
  //echo $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche d'un produit</title>
    <link rel="stylesheet" href="css/style.css">
</head>
  <body>
    <h1>Fiche d'un produit</h1>
    <div class="card">
      <div class="card-body">
        <h3 class="card-title"><?= "Nom du produit" ?></h3>
        <h6 class="card-subtitle"><?= "Prix de vente" ?></h6>
      </div>
    </div>
    <a href="index.php" >Retour à l'accueil</a>

  </body>
</html>