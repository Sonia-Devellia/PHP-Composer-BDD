<?php $message = ""; ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <title>Ajout d'un produit</title>
</head>

<body>
    <section class="formulaire">
        <h1 class="title">Base de données ABC - Ajout d'un produit</h1>
        <form method="POST" action="">
            <label>Description : <input type="text" name="designation" placeholder="Produit"
                    value="<?= isset($_POST['designation']) ? htmlspecialchars($_POST['designation']) : '' ?>">
            </label>

            <label>Prix (en €) : <input type="number" step="0.01" name="tarif" placeholder="0.00"
                    value="<?= isset($_POST['tarif']) ? htmlspecialchars($_POST['tarif']) : '' ?>">
            </label>


            <?php
            //Affichage des erreurs avant le bouton 
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                require 'register.php';
            }
            ?>

            <input class="bouton" type="submit" value="Ajouter">
        </form>

        <?php
        if (isset($_GET['success'])) {
            echo "<p class='validation'>Produit ajouté avec succès !</p>";
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require 'register.php';
        }
        ?>
    </section>
</body>

</html>