<?php 
    include_once "include/config.php";
    $mysqli = new mysqli($host, $username, $password, $database);
    // Vérifier la connexion
    if ($mysqli -> connect_errno) {
        echo "Échec de connexion à la base de données MySQL: " . $mysqli -> connect_error;
        exit();
    } else  {
        //echo "Connexion réussie!!";
    }

    $messageAjout = '';
    $messageMAJ = '';
    $messageSUPP = '';


    if (isset($_POST['boutonAjouter'])) {        
        /************************************************/
        /*              Code pour l'ajout               */
        /************************************************/
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
        } else {
        $messageAjout = "<div class='alert alert-danger'>Veuillez remplir tous les champs du formulaire.</div>";// Message ajouté dans la page si la requête n'est pas soumise
        }

        echo $messageAjout; // Message ajouté dans la page en cas d'ajout réussi ou non
        
    } else if (isset($_POST['boutonEditer'])) {      
        /************************************************/
        /*            Code pour l'édition               */
        /************************************************/
        $messageMAJ = 'Message qui sera généré selon le succès ou l’échec de la mise à jour du produit.';

        // Vérification que la page a été soumise et que tous les champs sont présents
        if(isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['prix_coutant']) && isset($_POST['prix_vente']) && isset($_POST['qte_stock'])) { 
            $mysqli = new mysqli($host, $username, $password, $database); // Établissement de la connexion à la base de données
            if ($mysqli -> connect_errno) { // Affichage d'une erreur si la connexion échoue
                echo 'Échec de connexion à la base de données MySQL: ' . $mysqli -> connect_error;
            } 
            
            if ($requete = $mysqli->prepare("UPDATE produits SET nom=?, prix_coutant=?, prix_vente=?, qte_stock=? WHERE id=?")) {  // Création d'une requête préparée 
                
                /************************* ATTENTION **************************/
                /* On ne fait présentement peu de validation des données.     */
                /* On revient sur cette partie dans les prochaines semaines!! */
                /**************************************************************/
                $requete->bind_param("sddii", $_POST['nom'], $_POST['prix_coutant'], $_POST['prix_vente'], $_POST['qte_stock'], $_POST['id']); // Envoi des paramètres à la requête. 

                if($requete->execute()) { // Exécution de la requête
                    $messageMAJ = "<div class='alert alert-success'>Produit mis à jour</div>";  // Message ajouté dans la page en cas d'ajout réussi
                } else {
                    $messageMAJ =  "<div class='alert alert-danger'>Une erreur est survenue lors de la mise à jour.</div>";  // Message ajouté dans la page en cas d'ajout en échec
                }

                $requete->close(); // Fermeture du traitement
            } else  {
                echo $mysqli->error;
            }
        }

    } else if (isset($_POST['boutonSupprimer'])) {        
        /************************************************/
        /*           Code pour la suppression           */
        /************************************************/
        $messageSUPP = 'Message qui sera généré selon le succès ou l’échec de la suppression du produit.';

        if (isset($_POST['id'])) {
            $mysqli = new mysqli($host, $username, $password, $database); // Établissement de la connexion à la base de données
            if ($mysqli -> connect_errno) { // Affichage d'une erreur si la connexion échoue
                echo 'Échec de connexion à la base de données MySQL: ' . $mysqli -> connect_error;
            } 
            
            if ($requete = $mysqli->prepare("DELETE FROM produits WHERE id=?")) {  // Création d'une requête préparée 
                /************************* ATTENTION **************************/
                /* On ne fait présentement peu de validation des données.     */
                /* On revient sur cette partie dans les prochaines semaines!! */
                /**************************************************************/
                $requete->bind_param("i", $_POST['id']); // Envoi des paramètres à la requête. 

                if($requete->execute()) { // Exécution de la requête
                    $messageSUPP = "<div class='alert alert-success'>Produit supprimé</div>";  // Message ajouté dans la page en cas d'ajout réussi
                } else {
                    $messageSUPP =  "<div class='alert alert-danger'>Une erreur est survenue lors de la suppression.</div>";  // Message ajouté dans la page en cas d'ajout en échec
                }

                $requete->close(); // Fermeture du traitement
            } else  {
                echo $mysqli->error;
            }
        } 
    } 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/produits.js"></script>
</head>
<body>
    <h1>Accueil</h1>

    <?= $messageAjout ?><?= $messageMAJ ?><?= $messageSUPP ?>

    <!--<h2>Affichage des produits en format "textuel"</h2>-->
    <?php
        /*$res = $mysqli->query("SELECT nom, prix_vente, qte_stock FROM produits ORDER BY nom;");
        while ($row = $res->fetch_assoc()) {
            echo  "<p>" . $row["nom"] . " : " . $row["prix_vente"] . "$, " . $row["qte_stock"] . " items(s) en stock<p>";
        }*/
    ?>    


    <?php 
        include_once "include/dialogue-formulaire-ajout.php";
        include_once "include/dialogue-fiche.php";
        include_once "include/dialogue-formulaire-edition.php";
        include_once "include/dialogue-formulaire-suppression.php";
    ?>

    <h2>Affiche des produits en format "carte"</h2>
    <div class="flex">     
        <?php
            $res = $mysqli->query("SELECT id, nom, prix_coutant, prix_vente, qte_stock FROM produits ORDER BY nom;");
            while ($row = $res->fetch_assoc()) {
        ?>
        <div class="card">
            <img src="https://picsum.photos/id/63/200/300" alt="Photo d'un produit">
            <h3><?= $row["nom"] ?></h3>
            <p><a href="fiche_produit.php?id=<?= $row["id"] ?>">Détail (url)</a></p>
            <p><a href="miseajour_produit.php?id=<?= $row["id"] ?>">Modifier (url)</a></p>
            <p><a href="suppression_produit.php?id=<?= $row["id"] ?>">Supprimer (url)</a></p>

            <div><button onclick="ouvrirDialogueFiche(<?= $row['id'] ?>)">Afficher (dialog)</button></div>
            <div><button onclick="ouvrirDialogueEdition(<?= $row['id'] ?>)">Modifier (dialog)</button></div>
            <div><button onclick="ouvrirDialogueSuppression(<?= $row['id'] ?>)">Supprimer (dialog)</button></div>
        </div>

        <?php
            }
        ?>
    </div>

    <a href="ajout_produit.php">Ajouter un produit (url)</a><br>
    <button onclick="ouvrirDialogueAjout()">Ajouter un produit (dialog)</button>

    
    <h2>Autres affichages</h2>
    <div><a href="produits_tableau.php">Affichage des produits dans un tableau (table)</a></div>
    <div><a href="clients_liste.php">Affichage des clients dans une liste (ul)</a></div>

<?php
    $mysqli->close(); // Fermeture de la connexion
?>
    


</body>
</html>