<?php
header('Content-Type: application/json; charset=utf-8');

include_once  '../../include/config.php'; // Inclusion des paramètres de connexion

if($_SERVER['REQUEST_METHOD'] === 'GET') {
 
    if(!isset($_GET['id'])) { // Vérification que la page reçoit un identifiant en paramètre
      echo 'Identifiant manquant';
      exit();
    }

    $mysqli = new mysqli($host, $username, $password, $database); // Établissement de la connexion à la base de données
    if ($mysqli -> connect_errno) { // Affichage d'une erreur si la connexion échoue
        echo 'Échec de connexion à la base de données MySQL: ' . $mysqli -> connect_error;
        exit();
    } 

    if ($requete = $mysqli->prepare("SELECT * FROM clients WHERE id=?")) {  // Création d'une requête préparée 

      $requete->bind_param("i", $_GET['id']); // Envoi des paramètres à la requête
      $requete->execute(); // Exécution de la requête

      $result = $requete->get_result(); // Récupération de résultats de la requête
      $client = $result->fetch_assoc(); // Récupération de l'enregistrement
      
      // afficher le produit au format JSON
      if($client) {
        echo json_encode($client);
      }

      $requete->close(); // Fermeture du traitement 
    }

    $mysqli->close(); // Fermeture de la connexion 
}

?>