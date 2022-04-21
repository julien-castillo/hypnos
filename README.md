# ECF Studi Hypnos 2022
***
## Table des matières
1. [Description du projet](#description)
2. [Deploiement local](#local)
4. [Technologies](#techno)
5. [Comment utiliser le site](#howtowebsite)
6. [Documents](#docs)
***
<a name="description"></a>
### Description du projet
L'objectif principal est de créer une application web complète pour un groupe hôtelier. 7 fonctionnalités principales sont nécessaires avec 4 types de comptes utilisateurs : Admin, Manager, client, visiteur. 

***
<a name="local"></a>
### Deploiement local
Pour déployer le site sur votre environnement local, merci de suivre ces différentes étapes :
```

Dans votre terminal :

$ git clone https://github.com/julien-castillo/hypnos.git hypnos
$ cd hypnos
$ composer install
$ php artisan storage:link

Créer votre base données
Configurez le fichier .env

$ php artisan migrate --seed
$ php artisan serve
```

Vous pouvez vous connecter en "admin" avec les identifiants suivants :
Login : admin@admin.fr
Password : admin

Vous pouvez vous connecter en "manager" avec les identifiants suivants :
Login : manager1@manager.fr or manager2@manager.fr .... -> manager7@manager.fr
Password : manager

Vous pouvez vous connecter en "client" avec les identifiants suivants :
Login : user1@user.fr or user2@user.fr
Password : user

<a name="techno"></a>
### Technologies
A list of technologies used within the project:
* [HTML 5]
* [CSS 3]
* * [Bootstrap]Version 5.1
* [JavaScript]
* * [Swiper.js] Version 8.1.3
* * [jquery] Version 3.4.1
* [PHP 7.4]
* * [Laravel] Version 8.83.6
* [Mysql / MariaDB]
  <a name="docs"></a>
### Docs
* Graphic Chart & wireframes :
[Document.pdf](https://github.com/julien-castillo/hypnos/blob/master/Documents/Charte_Graphique_Hypnos.pdf)
* Maquettes :
[Document.pdf](https://github.com/julien-castillo/hypnos/blob/master/Documents/Maquettes%20_%20ECF_Studi_HYPNOS.pdf)
* Documentation technique :
[Document.pdf](https://github.com/julien-castillo/hypnos/blob/master/Documents/Documentation_Technique.pdf)
* Manuel d'utilisation :
[Document.pdf](https://github.com/julien-castillo/hypnos/blob/master/Documents/Manuel_hypnos.pdf)
