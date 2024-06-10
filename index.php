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

    <h2>Affiche des produits en format "carte"</h2>
    <div class="flex">     
        <?php
            $res = $mysqli->query("SELECT nom, prix_vente, qte_stock FROM produits ORDER BY nom;");
            while ($row = $res->fetch_assoc()) {
        ?>
        <div class="card">
            <img src="https://picsum.photos/id/63/200/300" alt="Photo d'un produit">
            <h3><?= $row["nom"] ?></h3>
            <p><a href="fiche_produit.php">Détail</a></p>
        </div>

        <?php
            }
        ?>
    </div>
    <a href="ajout_produit.php">Ajouter un produit</a>

    
    <h2>Autres affichages</h2>
    <div><a href="produits_tableau.php">Affichage des produits dans un tableau (table)</a></div>
    <div><a href="clients_liste.php">Affichage des clients dans une liste (ul)</a></div>

<?php
    //phpinfo();
?>
    


</body>
</html>