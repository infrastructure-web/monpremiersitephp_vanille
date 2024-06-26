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

$messageAjout = '';;

if (isset($_POST['boutonAjouter'])) {        
    /************************************************/
    /*              Code pour l'ajout               */
    /************************************************/
    $messageAjout = 'Message qui sera généré selon le succès ou l’échec de l’ajout du produit.';

    // Vérification que la page a été soumise et que tous les champs sont présents
    if(isset($_POST['entreprise']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['telephone']) && isset($_POST['adresse']) 
            && isset($_POST['ville']) && isset($_POST['code_postal']) && isset($_POST['pays']) && isset($_POST['province'])) {

    $mysqli = new mysqli($host, $username, $password, $database); // Établissement de la connexion à la base de données
    if ($mysqli -> connect_errno) { // Affichage d'une erreur si la connexion échoue
        echo 'Échec de connexion à la base de données MySQL: ' . $mysqli -> connect_error;
    }    

        // Création d'une requête préparée
        if ($requete = $mysqli->prepare("INSERT INTO clients(entreprise, nom, prenom, telephone, adresse, ville, code_postal, pays, province) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)")) {      

            /************************* ATTENTION **************************/
            /* On ne fait présentement peu de validation des données.     */
            /* On revient sur cette partie dans les prochaines semaines!! */
            /**************************************************************/

            $requete->bind_param("sssssssss", $_POST['entreprise'], $_POST['nom'], $_POST['prenom'], $_POST['telephone'], $_POST['adresse'], $_POST['ville'], $_POST['code_postal'], $_POST['pays'], $_POST['province']);

            if($requete->execute()) { // Exécution de la requête
            $messageAjout = "<div class='alert alert-success'>Client ajouté</div>";  // Message ajouté dans la page en cas d'ajout réussi
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
}

?>