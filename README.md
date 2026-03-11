# PHP - Composer - Base de Données - MVC

Projet réalisé dans le cadre d'un cours sur **PHP et les bases de données**.  
L'objectif est d'ajouter des produits dans une base de données MySQL à partir d'un formulaire, en utilisant PDO, Composer et les bonnes pratiques de développement.  
Le projet a ensuite été **refactorisé en architecture MVC** afin de séparer clairement les responsabilités du code.

---

## Objectifs pédagogiques

- Mettre en œuvre **PDO** pour les opérations d'insertion et de lecture
- Utiliser **Composer** et le package **Phpdotenv** pour sécuriser les identifiants
- Gérer les exceptions avec **try / catch / finally**
- Appliquer le design pattern **Singleton** pour la connexion à la base de données
- Structurer un mini-projet en séparant les responsabilités
- Refactoriser un projet procédural en architecture **MVC**
- Appliquer la **Programmation Orientée Objet** (classes, méthodes statiques)

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

### Avant refactorisation (version procédurale)

```
php_data_base/
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

### Après refactorisation (version MVC)

```
php_data_base/
 ┣ cls/
 ┃  ┣ config.php           → Configuration globale (RACINE, BASE_URL, .env)
 ┃  ┗ database.php         → Classe Database (Singleton PDO)
 ┣ controleur/
 ┃  ┗ article_ctl.php      → Contrôleur : logique métier et validation
 ┣ modele/
 ┃  ┗ article_bd.php       → Modèle : opérations BDD (classe DBArticle)
 ┣ vue/
 ┃  ┣ entete.php           → En-tête HTML commune
 ┃  ┣ form_vue.php         → Vue formulaire d'ajout
 ┃  ┣ liste_vue.php        → Vue liste des articles
 ┃  ┗ pied.php             → Pied de page HTML
 ┣ static/css/
 ┃  ┗ style.css            → Mise en forme
 ┣ .env                    → Variables d'environnement (non versionné)
 ┣ .env.example            → Exemple de configuration
 ┣ composer.json           → Dépendances du projet
 ┣ index.php               → Point d'entrée unique
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
- Formulaire vidé automatiquement après une insertion réussie

---

## Architecture MVC

Le projet suit le design pattern **MVC (Modèle - Vue - Contrôleur)** :

| Couche | Fichier | Rôle |
|---|---|---|
| Modèle | `article_bd.php` | Parle à la base de données |
| Vue | `form_vue.php`, `liste_vue.php` | Affiche le HTML |
| Contrôleur | `article_ctl.php` | Coordonne modèle et vue |

### Flux de l'application

```
Navigateur → index.php
      ↓
config.php + database.php
      ↓
new ArticleController() → index()
      ↓
POST ? → validation → DBArticle::addArticle()
      ↓
DBArticle::getArticlesDuJour()
      ↓
entete.php + form_vue.php + liste_vue.php + pied.php
      ↓
Navigateur affiche la page
```

---

## Sécurité

- Les identifiants de connexion sont stockés dans un fichier `.env` non versionné
- Les requêtes SQL utilisent des paramètres préparés pour éviter les injections SQL
- `htmlspecialchars()` protège contre les failles XSS

---

## Concepts abordés

| Concept | Description |
|---|---|
| PDO | Connexion et requêtes vers MySQL |
| Composer | Gestionnaire de dépendances PHP |
| Phpdotenv | Chargement des variables d'environnement |
| Singleton | Une seule instance de connexion PDO |
| Try/Catch | Gestion des exceptions |
| MVC | Séparation Modèle / Vue / Contrôleur |
| POO | Classes, méthodes statiques, encapsulation |
| htmlspecialchars | Protection contre les failles XSS |
| Requêtes préparées | Protection contre les injections SQL |
| RACINE / BASE_URL | Chemins absolus fiables dans le projet |

---

## Installation

```bash
# Cloner le projet
git clone https://github.com/votre-compte/php_data_base.git

# Installer les dépendances
composer install

# Copier le fichier .env
cp .env.example .env

# Remplir le .env avec vos identifiants BDD
DB_HOST=localhost
DB_NAME=ma_base
DB_USERNAME=root
DB_PASSWORD=monmotdepasse
```
