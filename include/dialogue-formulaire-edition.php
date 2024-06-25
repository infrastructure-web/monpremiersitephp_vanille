<dialog id="dialogue-formulaire-edition" class="modal">
    <h1>Éditer un produit</h1>
    <form method="POST">
        <div>
            <div>
                <label for="nom">Nom du produit *</label>
                <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
                <input type="text" id="dialogue-formulaire-edition-nom" name="nom" required minlength="2" maxlength="50">
            </div>
        </div>

        <div>
            <div>
                <label for="prix_coutant">Prix coûtant *</label>
                <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
                <input type="number" step=".01" id="dialogue-formulaire-edition-prix-coutant" name="prix_coutant" required>
            </div>
            <div>
                <label for="prix_vente">Prix de vente *</label>
                <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
                <input type="number" step=".01" id="dialogue-formulaire-edition-prix-vente" name="prix_vente" required>
            </div>
            <div>
                <label for="qte_stock">Quantité en stock</label>
                <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
                <input type="number" id="dialogue-formulaire-edition-qte-stock" name="qte_stock" required>
            </div>
        </div>

        <button name="boutonEditer" type="submit">Modifier le produit</button>
        <button type="button" onclick="this.closest('dialog').close()">Annuler</button>
        <input type="hidden" id="dialogue-formulaire-edition-id" name="id" value="">
    </form>                         
</dialog>