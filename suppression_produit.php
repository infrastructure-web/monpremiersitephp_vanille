<?php
    include_once 'include/config.php';

    if(!isset($_GET['id'])) { // Vérification que la page reçoit un identifiant en paramètre
      echo 'Identifiant manquant';
      exit();
    }

    $messageSUPP = '';

    if (isset($_POST['submit']) && isset($_GET['id'])) {
      $mysqli = new mysqli($host, $username, $password, $database); // Établissement de la connexion à la base de données
      if ($mysqli -> connect_errno) { // Affichage d'une erreur si la connexion échoue
          echo 'Échec de connexion à la base de données MySQL: ' . $mysqli -> connect_error;
      } 
      
      if ($requete = $mysqli->prepare("DELETE FROM produits WHERE id=?")) {  // Création d'une requête préparée 
        /************************* ATTENTION **************************/
        /* On ne fait présentement peu de validation des données.     */
        /* On revient sur cette partie dans les prochaines semaines!! */
        /**************************************************************/
        $requete->bind_param("i", $_GET['id']); // Envoi des paramètres à la requête. 

        if($requete->execute()) { // Exécution de la requête
          $messageSUPP = "<div class='alert alert-success'>Produit supprimé</div>";  // Message ajouté dans la page en cas d'ajout réussi
        } else {
          $messageSUPP =  "<div class='alert alert-danger'>Une erreur est survenue lors de la suppression.</div>";  // Message ajouté dans la page en cas d'ajout en échec
        }

        $requete->close(); // Fermeture du traitement
      } else  {
        echo $mysqli->error;
      }
  
      $mysqli->close(); // Fermeture de la connexion 
  
    } 

    $mysqli = new mysqli($host, $username, $password, $database); // Établissement de la connexion à la base de données
    if ($mysqli -> connect_errno) { // Affichage d'une erreur si la connexion échoue
        echo 'Échec de connexion à la base de données MySQL: ' . $mysqli -> connect_error;
        exit();
    } 

    if ($requete = $mysqli->prepare("SELECT * FROM produits WHERE id=?")) {  // Création d'une requête préparée 

      $requete->bind_param("s", $_GET['id']); // Envoi des paramètres à la requête
      $requete->execute(); // Exécution de la requête

      $result = $requete->get_result(); // Récupération de résultats de la requête
      $produit = $result->fetch_assoc(); // Récupération de l'enregistrement

      $requete->close(); // Fermeture du traitement 
    }

    $mysqli->close(); // Fermeture de la connexion 
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Suppression d'un produit</title>
      <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div>
        <h1>Fiche d'un produit</h1>
        <? if ($produit) { ?>
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><?= $produit["nom"] ?></h3>
              <h6 class="card-subtitle"><?= $produit["prix_vente"] ?></h6>
            </div>
          </div>
          <p>Voulez-vous vraiment supprimer ce produit?</p>
          <form method="POST">
              <button name="submit" type="submit">Oui</button>
              <a class="button" href="index.php">Non</a>
          </form>
          <br>
        <? } else { ?>
          <?= $messageSUPP ?><br>
        <? } ?>      

    <a href="index.php" >Retour à l'accueil</a>
    </div>
   </body>
</html>