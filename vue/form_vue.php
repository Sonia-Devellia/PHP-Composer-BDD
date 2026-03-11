<section class="formulaire">
    <h1 class="title">Base de données ABC - Ajout d'un produit</h1>

    <form method="POST" action="">

        <label>Description :
            <input type="text"
                   name="designation"
                   placeholder="Produit"
                   value="<?= htmlspecialchars($designation) ?>" />
        </label>

        <label>Prix (en €) :
            <input type="number"
                   step="0.01"
                   name="tarif"
                   placeholder="0.00"
                   value="<?= htmlspecialchars($tarif) ?>" />
        </label>

        <!-- Message d'erreur -->
        <?php if (!empty($erreur)) { ?>
            <p class="champs"><?= $erreur ?></p>
        <?php } ?>

        <!-- Message de succès -->
        <?php if ($success) { ?>
            <p class="validation">Produit ajouté avec succès !</p>
        <?php } ?>

        <input class="bouton" type="submit" value="Ajouter" />

    </form>
</section>