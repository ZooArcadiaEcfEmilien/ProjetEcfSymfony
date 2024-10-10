# Zoo Arcadia Projet ECF

Ce site est un projet de développement en vue de l'obtention d'un diplome de développeur web & web mobile.
Ce site est celui d'un Zoo fictif reprenant les classiques d'un vrai zoo avec des animaux, services etc et notemment un dashboard pour les employés qui permet d'administrer le zoo (services, horaires, animaux ...)

## Technologies Utilisées

- **Symfony**: Version [7.1.5] 
- **Symfony CLI** : Version [5.8.14]
- **PHP**: Version [8.3.8]
- **MAMP**: Utilisé pour le développement local
- **Base de données**:
  - **MySQL**: Gestion des données relationnelles avec le logiciel PhpMyAdmin ou MySqlWorkBench
  - **MongoDB**: Gestion des données NoSQL avec le logiciel MongoDB Compass


## Prérequis

Avant de commencer, assure-toi d'avoir installé les éléments suivants :

- [MAMP](https://www.mamp.info/en/) (ou tout autre serveur local compatible)
- [Composer](https://getcomposer.org/) pour la gestion des dépendances PHP

## Installation

1. Clone le dépôt :
   ```bash
   git clone https://github.com/ton-utilisateur/ton-projet.git
   cd ton-projet

2. Utilise la commande : composer install (installe les dépendances nécessaire)

3. Configurer une Base de donnée SQL + NoSql (L'onglet Evenement du site utilise une base NoSQL avec MongoDB, le reste est en SQL)

4. Configurer les variables d'environnement

5. Lancer le serveur local : php bin/console server:run ou symfony server:start

6. Exécuter le script /Migrations/setup.sql pour initialisé la table SQL 

7. Exécuter le script /Migrations/addValueInTable.sql si vous souhaitez ajoutez des données par défauts

## Déploiement

Le site est déployé et disponible sur le lien suivant : https://app-arcadia-38c21c4909e6.herokuapp.com/accueil 