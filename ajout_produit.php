<?php
    include_once 'include/config.php';
    $messageAjout = 'Message qui sera généré selon le succès ou l’échec de l’ajout du produit.';

    // Vérification que la page a été soumise et que tous les champs sont présents
    if(isset($_POST['nom']) && isset($_POST['prix_coutant']) && isset($_POST['prix_vente']) && isset($_POST['qte_stock'])) {
      $mysqli = new mysqli($host, $username, $password, $database); // Établissement de la connexion à la base de données
      if ($mysqli -> connect_errno) { // Affichage d'une erreur si la connexion échoue
          echo 'Échec de connexion à la base de données MySQL: ' . $mysqli -> connect_error;
      }    

      // Création d'une requête préparée
      if ($requete = $mysqli->prepare("INSERT INTO produits(nom, prix_coutant, prix_vente, qte_stock) VALUES(?, ?, ?, ?)")) {      

        /************************* ATTENTION **************************/
        /* On ne fait présentement peu de validation des données.     */
        /* On revient sur cette partie dans les prochaines semaines!! */
        /**************************************************************/

        $requete->bind_param("sddi", $_POST['nom'], $_POST['prix_coutant'], $_POST['prix_vente'], $_POST['qte_stock']);

        if($requete->execute()) { // Exécution de la requête
          $messageAjout = "<div class='alert alert-success'>Produit ajouté</div>";  // Message ajouté dans la page en cas d'ajout réussi
        } else {
          $messageAjout =  "<div class='alert alert-danger'>Un paramètre POST est manquant.</div>";  // Message ajouté dans la page en cas d’échec
        }
        $requete->close(); // Fermeture du traitement

      } else  {
        echo $mysqli->error;
      }

      $mysqli->close(); // Fermeture de la connexion

    } else {
      $messageAjout = "<div class='alert alert-danger'>Veuillez remplir tous les champs du formulaire.</div>";// Message ajouté dans la page si la requête n'est pas soumise
    }

    echo $messageAjout; // Message ajouté dans la page en cas d'ajout réussi ou non
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
	<div>
		<h1>Ajouter un produit</h1>
		<form method="POST" action="">
      <div>
        <label for="nom">Nom du produit *</label>
        <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
        <input type="text" class="form-control" id="nom" name="nom" required minlength="2" maxlength="50">
      </div>
      
      <div class="flex">
        <div>
          <label for="prix_coutant">Prix coûtant *</label>
          <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
          <input type="number" step=".01" class="form-control" id="prix_coutant" name="prix_coutant" required>
        </div>

        <div>
          <label for="prix_vente">Prix de vente *</label>
          <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
          <input type="number" step=".01" class="form-control" id="prix_vente" name="prix_vente" required>
        </div>
      </div>

      <div>
        <label for="qte_stock">Quantité en stock</label>
        <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
			  <input type="number" class="form-control" id="qte_stock" name="qte_stock" required>
			  
		  </div>

        <button class="btn btn-primary" type="submit">Ajouter le produit</button>
        <div><a href="index.php" class="float-right">Retour à l'accueil</a></div>
		</form>
	</div></body>
</html>