# Gestion Automatisée des Tests Présentiels

## Description
Ce projet vise à automatiser le processus d'évaluation des candidats via un quiz en ligne et la planification des tests présentiels (technique, administratif et CME). Il permet également l'assignation automatique du personnel en fonction des disponibilités et la gestion des évaluations.

## Objectifs du Projet
- Permettre aux candidats de créer un compte et soumettre leurs informations.
- Automatiser l'évaluation initiale via un quiz.
- Planifier automatiquement les tests présentiels.
- Assigner le personnel en fonction des disponibilités.
- Assurer un suivi et un reporting des évaluations.

## Fonctionnalités

### 1. Inscription et Connexion
- Création de compte avec email et mot de passe.
- Vérification de l'email pour activer le compte.
- Connexion sécurisée avec gestion de sessions.

### 2. Soumission des Documents
- Upload de la carte d'identité (JPEG, PNG, PDF).
- Saisie des informations personnelles (nom, prénom, date de naissance, téléphone, adresse).

### 3. Passage du Quiz
- Affichage du quiz après validation des documents.
- Gestion d'un timer.
- Calcul automatique du score.
- Validation pour accéder au test présentiel si le score est suffisant.

### 4. Planification des Tests Présentiels
- Sélection automatique d’une date et d’un examinateur en fonction des disponibilités.
- Envoi automatique de la convocation par email avec date et lieu.

### 5. Assignation Automatique du Personnel
- Algorithme d'assignation prenant en compte les disponibilités.
- Interface pour l'admin permettant de visualiser et modifier les assignations.
- Notifications automatiques envoyées aux membres du personnel.

### 6. Gestion des Groupes pour le Test CME
- Organisation en groupes de 4 candidats.
- Sessions : Matin (3 groupes) et Après-midi (3 groupes).
- Interface dédiée au personnel pour modifier les groupes et ajouter des commentaires.

### 7. Test Technique
- Durée : 20 minutes par candidat.
- Interface permettant d'accéder aux candidats assignés et d'ajouter des commentaires.

### 8. Test Administratif
- Durée : 15 minutes par candidat.
- Interface pour accéder aux candidats assignés et ajouter des commentaires.

### 9. Suivi et Reporting
- Consultation et modification des évaluations.
- Génération de rapports individuels ou groupés.
- Accès à l'historique des évaluations.

## Contraintes Techniques
- **Backend** : Laravel 7/8/9/10 (monolithique) avec Blade pour l'UI.
- **Gestion des accès** : Rôles et permissions avec Auth Gates et Middlewares.
- **Validation des entrées** : Custom Requests.
- **Base de données** : MySQL ou PostgreSQL.
- **Authentification** : Laravel Auth avec gestion des sessions.
- **Stockage des fichiers** : Local ou cloud.
- **Déploiement** : Hébergement sur DigitalOcean, AWS ou Heroku.

## Installation et Déploiement
### Prérequis
- PHP 8+
- Composer
- PostgreSQL
- Laravel 8

### Étapes d'installation
```sh
# Cloner le projet
git clone https://github.com/Keltoummalouki/Tests_Acceptation_Youcode
cd Tests_Acceptation_Youcode

# Installer les dépendances
composer install

# Configurer l'environnement
cp .env.example .env
php artisan key:generate

# Configurer la base de données
php artisan migrate --seed

# Lancer le serveur local
php artisan serve
```

### Déploiement
```sh
# Compiler les assets
npm install && npm run dev

# Mettre en production
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## Contributions
Les contributions sont les bienvenues ! Merci de suivre ces étapes :
1. Forker le projet
2. Créer une branche (`feature-nouvelle-fonctionnalite`)
3. Faire une pull request

## Licence
Ce projet est sous licence MIT. Consultez le fichier LICENSE pour plus d’informations.

## Contact
Développé par **Keltoum Malouki**
- [GitHub](https://github.com/Keltoummalouki)
- [LinkedIn](https://www.linkedin.com/in/keltoum-malouki-79a28029a/)
