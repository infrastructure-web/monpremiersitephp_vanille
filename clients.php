<?php
    include_once "include/CRUD/code_ajout_client_mysql.php";
?>


<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/clients.js"></script>
</head>
<body>
    <?php
        include "include/dialogue-ajout-client.php";
        include "include/dialogue-fiche-client.php";
    ?>

    <button onclick="openAjoutClientDialog()">Ajouter un client</button>

    <button onclick="openFicheClientDialog(1)">Afficher le client #1</button>
    <button onclick="openFicheClientDialog(12)">Afficher le client #12</button>
</body>
<html>