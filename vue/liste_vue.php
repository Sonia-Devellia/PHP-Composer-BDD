<section class="liste_article">
    <h2 class="title">Liste des articles ajoutés :</h2>
    <table>
        <thead>
            <tr>
                <td>Designation</td>
                <td>Tarif</td>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($articles)) { ?>
                <tr>
                    <td colspan="2">Aucun article ajouté aujourd'hui.</td>
                </tr>
            <?php } else { ?>
                <?php foreach ($articles as $article) { ?>
                    <tr>
                        <td><?= htmlspecialchars($article["designation"]) ?></td>
                        <td><?= htmlspecialchars($article["tarif"]) ?>€</td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
</section>
