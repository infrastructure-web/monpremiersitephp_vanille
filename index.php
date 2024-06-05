<?php 
    include_once "include/config.php";
    $mysqli = new mysqli($host, $username, $password, $database);
    // Vérifier la connexion
    if ($mysqli -> connect_errno) {
        echo "Échec de connexion à la base de données MySQL: " . $mysqli -> connect_error;
        exit();
    } else  {
        echo "Connexion réussie!!";
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Exercice 1</h1>
    <?php

        $res = $mysqli->query("SELECT nom, prix_vente, qte_stock FROM produits ORDER BY nom;");
        echo "<table class='table'>";

        // Affichage de l'entête du tableau
        echo "<tr>";
        echo "<th>Nom</th>";
        echo "<th>Prix de vente</th>";
        echo "<th>Quantité en stock</th>";
        echo "</tr>";
        
        while ($row = $res->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["nom"] . "</td>";
            echo "<td>" . $row["prix_vente"] . "$ </td>";
            echo "<td>" . $row["qte_stock"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>

    <div>
        <ul> 
            <li><a href="produits_tableau.php">Affichage des produits dans un tableau (table)</a></li>
            <li><a href="clients_liste.php">Affichage des clients dans une liste (ul)</a></li>
        </ul>
    </div>


<?php
    //phpinfo();
?>
    


</body>
</html>