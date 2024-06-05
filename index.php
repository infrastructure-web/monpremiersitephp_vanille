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
    <title>Accueil</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Accueil</h1>

    <h2>Affichage des produits en format "textuel"</h2>
    <?php
        $res = $mysqli->query("SELECT nom, prix_vente, qte_stock FROM produits ORDER BY nom;");
        while ($row = $res->fetch_assoc()) {
            echo  "<p>" . $row["nom"] . " : " . $row["prix_vente"] . "$, " . $row["qte_stock"] . " items(s) en stock<p>";
        }
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