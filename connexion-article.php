<?php
// connexion a la bdd pour récupérer les 10 derniers artciles du jour ajoutés
try {
    //$conn = new PDO("mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn = Database :: getInstance();
    
    $stmt = $conn->prepare("SELECT designation, tarif FROM ARTICLE WHERE DATE(created_at)=CURDATE() ORDER BY created_at DESC LIMIT 10");
    $stmt->execute();
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($articles as $article) {
        echo "<tr>";
        echo "<td>" . $article["designation"] . "</td>";
        echo "<td>" . $article["tarif"] . "€</td>";
        echo "</tr>";
    }
} catch (PDOException $e) {
    echo "<p> Erreur : " . $e->getMessage() . "</p>";
} finally {
    $conn = null;
}
