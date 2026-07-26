# Projet Laravel

## Description

Ce projet est une application développée avec le framework **Laravel**.

Suivez les étapes ci-dessous pour installer et démarrer correctement le projet en environnement local.

---

## Prérequis

Avant de commencer, assurez-vous d'avoir installé :

* **PHP**
* **Composer**
* **Laravel**
* Un système de gestion de base de données compatible avec Laravel

---

## Installation

### 1. Cloner le projet

```bash
git clone https://github.com/Programmer-Emmanuel/Application-de-parrainage-IUA-D-partement-Informatique.git
cd Application-de-parrainage-IUA-D-partement-Informatique
```

### 2. Installer les dépendances

À la racine du projet, exécutez :

```bash
composer install
```

### 3. Initialiser la base de données

Exécutez la commande suivante :

```bash
php artisan migrate:fresh --seed
```

Cette commande permet de supprimer et recréer les tables de la base de données, puis d'exécuter les seeders par défaut.

Ensuite, exécutez les seeders spécifiques aux différentes formations :

```bash
php artisan db:seed --class=L1MIAGESeeder
php artisan db:seed --class=L2MIAGESeeder
php artisan db:seed --class=L1GISeeder
php artisan db:seed --class=L2GISeeder
```

### 4. Lancer le serveur

Pour démarrer l'application en local :

```bash
php artisan serve
```

L'application sera ensuite accessible à l'adresse :

```text
http://127.0.0.1:8000
```

---

## Résumé des commandes

```bash
composer install

php artisan migrate:fresh --seed

php artisan db:seed --class=L1MIAGESeeder
php artisan db:seed --class=L2MIAGESeeder
php artisan db:seed --class=L1GISeeder
php artisan db:seed --class=L2GISeeder

php artisan serve
```

---

## Développement

Projet développé avec **Laravel**.
