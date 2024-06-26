function openAjoutClientDialog() {
    console.log("openAjoutClientDialog");
    dialogAjout = document.getElementById("dialogue-ajout-client");
    dialogAjout.showModal();
}

function openFicheClientDialog(id) {
    console.log("openFicheClientDialog");
    console.log(id); // Pour débogage
    dialogAjout = document.getElementById("dialogue-fiche-client");

    getClient(id).then(client => { 
        console.log(client);
        if (client) {
            document.getElementById("dialogue-fiche-entreprise").textContent = client.entreprise;
            document.getElementById("dialogue-fiche-nom").textContent = client.nom;
            document.getElementById("dialogue-fiche-prenom").textContent = client.prenom;

            dialogue.showModal();
        } 
    });


    dialogAjout.showModal();
}




async function getClient(id) {
    let response = await fetch('api/clients/?id=' + id);
        
    if (response.ok) {
        console.log(response);
        return await response.json();   // retourne le client
    } else {
        alert('Il y a eu un problème avec l\'opération fetch. Voir la console pour plus de détails ');
        console.log(await response.json()); // affiche l'erreur
    }
}