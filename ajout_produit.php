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
		<form>
      <div>
        <label for="nom">Nom du produit *</label>
        <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
        <input type="text" class="form-control" id="nom" name="nom" required minlength="2" maxlength="50">
      </div>
      
      <div class="flex">
        <div>
          <label for="prix_unitaire">Prix coûtant *</label>
          <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
          <input type="number" step=".01" class="form-control" id="prix_unitaire" name="prix_unitaire" required>
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