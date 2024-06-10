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
    
    <p><a href="index.php">Retour à l'accueil</a></p>

<?php
    //phpinfo();
?>
    


</body>
</html>