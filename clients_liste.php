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
        <?php while ($row = $res->fetch_assoc()) { ?>
            <li>
                <?= $row['nom'] ?>,  <?= $row['prenom'] ?>
            </li>
        <?php
            }
        ?>
    </ul>

    <h2>Liste déroulante</h2>
    <?php
        $res = $mysqli->query("SELECT * FROM clients ORDER BY nom, prenom;");

        // $_POST["client_id"]
    ?>


    <select name="client_id">
        <?php while ($row = $res->fetch_assoc()) { ?>
            <option value="<?= $row['id'] ?>">
                <?= $row['nom'] ?>,  <?= $row['prenom'] ?>
            </option>
        <?php
            }
        ?>
    </select>

    <p><a href="index.php">Retour à l'accueil</a></p>


<?php
    //phpinfo();
?>
    


</body>
</html>