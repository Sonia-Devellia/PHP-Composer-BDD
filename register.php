<?php
// affichage des erreurs du formulaire
if (empty($_POST['designation']) || empty($_POST['tarif'])) {
    echo "<p class='champs'>Tous les champs sont obligatoires</p>";
} elseif ($_POST['tarif'] < 0) {
    echo "<p class='tarif'>Le tarif doit être un nombre positif ou null</p>";
} else {

    try {
        //$conn = new PDO("mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
        //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn = Database::getInstance();
        $sql = "INSERT INTO ARTICLE (designation, tarif) VALUES (:designation, :tarif)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':designation' => $_POST['designation'],
            ':tarif'       => $_POST['tarif']
        ]);

        // on redirige vers la même page, les champs se vident automatiquement
        header('Location: index.php?success=1');
        exit;
        
    } catch (PDOException $e) {
        echo "<p> Erreur : " . $e->getMessage() . "</p>";
    } finally {
        $conn = null;
    }
}
