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
    <title>Tableau de produits</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Tableau de produits</h1>
    <?php
        $res = $mysqli->query("SELECT nom, prix_vente, qte_stock FROM produits ORDER BY nom;");
    ?>

    <table>
        <tr>
            <th>Nom</th>
            <th>Prix de vente</th>
            <th>Quantité en stock</th>
        </tr>

        <?php
            while ($row = $res->fetch_assoc()) {
        ?>
            <tr>
                <td><?= $row["nom"]?></td>
                <td><?= $row["prix_vente"] ?></td>
                <td><?= $row["qte_stock"] ?></td>
            </tr>
        <?php
            }
        ?>
    </table>
    
    <div>
        <ul> 
            <li><a href="index.php">Accueil : index.php</a></li>
            <li><a href="produits_tableau.php">Affichage des produits dans un tableau (table) : produits_tableau.php</a></li>
            <li><a href="clients_liste.php">Affichage des clients dans une liste (ul) : clients_liste.php</a></li>
        </ul>
    </div>

<?php
    //phpinfo();
?>
    


</body>
</html>