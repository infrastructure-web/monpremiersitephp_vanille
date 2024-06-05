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
    <title>Liste des clients</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Liste des clients</h1>
    <?php
        $res = $mysqli->query("SELECT * FROM clients ORDER BY nom, prenom;");
    ?>

    <ul>
        <?php
            while ($row = $res->fetch_assoc()) {
        ?>
            <li>
                <?= $row['nom'] ?>,  <?= $row['prenom'] ?>
            </li>
        <?php
            }
        ?>
    </ul>
    
    <div>
        <ul> 
            <li><a href="index.php">Accueil : index.php</a></li>
            <li><a href="produits_tableau.php">Affichage des produits dans un tableau (table) : produits_tableau.php</a></li>
            <li><a href="clients_liste.php">Affichage des clients dans une liste (ul) : clients_liste.php</a></li>
        </ul>
    </div>

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