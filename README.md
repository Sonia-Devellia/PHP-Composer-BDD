# PHP - Composer - Base de Données

Projet réalisé dans le cadre d'un cours sur **PHP et les bases de données**.  
L'objectif est d'ajouter des produits dans une base de données MySQL à partir d'un formulaire, en utilisant PDO, Composer et les bonnes pratiques de développement.

---

## Objectifs pédagogiques

- Mettre en œuvre **PDO** pour les opérations d'insertion et de lecture
- Utiliser **Composer** et le package **Phpdotenv** pour sécuriser les identifiants
- Gérer les exceptions avec **try / catch / finally**
- Appliquer le design pattern **Singleton** pour la connexion à la base de données
- Structurer un mini-projet en séparant les responsabilités

---

## Technologies utilisées

- PHP 8+
- MySQL
- PDO
- Composer
- vlucas/phpdotenv
- HTML / CSS

---

## Structure du projet

```
php_data_base
 ┣ index.php               → Point d'entrée, charge l'environnement
 ┣ form.php                → Formulaire HTML d'ajout d'un produit
 ┣ register.php            → Traitement de l'insertion en base de données
 ┣ liste-articles.php      → Affichage HTML du tableau des articles
 ┣ connexion-article.php   → Requête SELECT des articles du jour
 ┣ data-base.php           → Classe Database (Singleton PDO)
 ┣ style.css               → Mise en forme
 ┣ .env.example            → Exemple de configuration (sans les vraies valeurs)
 ┣ composer.json           → Dépendances du projet
 ┗ vendor/                 → Packages Composer (non versionné)
```

---

## Fonctionnalités

- Ajout d'un article via un formulaire (désignation + tarif)
- Validation des champs côté serveur
- Protection contre les injections SQL (requêtes préparées)
- Protection contre les failles XSS (htmlspecialchars)
- Affichage des 10 derniers articles ajoutés du jour
- Connexion PDO via le pattern Singleton
- Identifiants sécurisés via `.env`
- Pattern Post/Redirect/Get après insertion

---

## Sécurité

- Les identifiants de connexion sont stockés dans un fichier `.env` non versionné
- Les requêtes SQL utilisent des paramètres préparés pour éviter les injections SQL


---

## Concepts abordés

| Concept | Description |
|---|---|
| PDO | Connexion et requêtes vers MySQL |
| Composer | Gestionnaire de dépendances PHP |
| Phpdotenv | Chargement des variables d'environnement |
| Singleton | Une seule instance de connexion PDO |
| Try/Catch/Finally | Gestion des exceptions |
| Post/Redirect/Get | Éviter la re-soumission du formulaire |
| htmlspecialchars | Protection contre les failles XSS ( a inclure )|

---

## Auteur

**Sonia Devellia** — Formation développement web
