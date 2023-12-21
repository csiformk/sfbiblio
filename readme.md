# BIBLIOSF


## Cahier des charges

A l'aide de **Symfony** vous devez réaliser un site web qui listes des livres d'une bibliotheque nommée **BIBLIOS**F.

- Le schema de la base de donnée se trouve dans le dossier **data** ![Base de donnée](./data/books_schema.png)

- Créer une gestion des **utilisateurs** : **connexion,déconnexion,enregistrement**

- Créer des **cruds** pour les **utilisateurs** et les **livres**
- Ajouter des fausses données via des **fixtures** et **faker**

- Dans votre **navbar** il doit y avoir 
    - Le nom de la bibliotheque **BIBLIOSF** à l'extreme gauche
    - A l'extreme droite : 3 boutons/liens : **connexion,déconnexion,enregistrement** , les boutons **connexion et enregistrement** doivent disparaitres quand on est **connecté**

- La **page d'acceuil** doit afficher les livres sous forme de **cards** avec le **titre** et l'**image** 
- Pour les **images** mettez des **urls** de livres existants
- Lorsque on **click** sur un **livre** on visualise sa fiche complete : **titre,resume,edition,auteur,année de publication,image**

- Libre à vous d'utiliser un **framework css**
- Faite un **readme** expliquant la démarche pour installer et lancer votre site web

# Installation du projet Symfony

`symfony new sfbiblio --version="7.0.*" --webapp`

- Copy des variables d'environnement dans `.env.local`
- On crée la base de donnée : `symfony console doctrine:database:create`

# Entitées

- Création des entitées **books** et **users** : `symfony make:entity` `symfony make:user`
- Création des cruds pour les entitées : `symfony make:crud`