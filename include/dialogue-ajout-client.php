<dialog id="dialogue-ajout-client">
    <p>Ceci est un dialogue qui servira à l'ajout d'un client</p>

    <form method="POST">
        <div>
            <label for="entreprise">Entreprise *</label>
            <input type="text" name="entreprise" id="entreprise" required>
        </div>

        <div>
            <label for="nom">nom *</label>
            <input type="text" name="nom" id="nom" required>
        </div>

        <div>
            <label for="prenom">prenom *</label>
            <input type="text" name="prenom" id="prenom" required>
        </div>

        <div>
            <label for="telephone">telephone *</label>
            <input type="tel" name="telephone" id="telephone" required>
        </div>

        <div>
            <label for="adresse">adresse *</label>
            <input type="text" name="adresse" id="adresse" required>
        </div>

        <div>
            <label for="ville">ville *</label>
            <input type="text" name="ville" id="ville" required>
        </div>

        <div>
            <label for="code_postal">code postal *</label>
            <input type="text" name="code_postal" id="code_postal" required>
        </div>

        <div>
            <label for="pays">pays *</label>
            <input type="text" name="pays" id="pays" required>
        </div>

        <div>
            <label for="province">province *</label>
            <input type="text" name="province" id="province" required>
        </div>


        <button name="boutonAjouter" type="submit">Ajouter le client</button>
        <button type="button" onclick="this.closest('dialog').close()">Annuler</button>
    </form>
</dialog>