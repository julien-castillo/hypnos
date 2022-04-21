# ECF Studi Hypnos 2022
***
## Table Of Contents
1. [Description of the project](#description)
2. [Deploiement](#local)
3. [Deploiement](#prod)
4. [Technologies used](#techno)
5. [How to use the website](#howtowebsite)
6. [Docs](#docs)
***
<a name="description"></a>
### Description of the project
The main goal is to create a complete website of an hotel group. 7 main functionnalties are required, with 4 types of people using the website. The Admin, the Manager, the user and the Visitor. <br>
***
<a name="local"></a>
### Local deployment
For a local deployment; please do these different steps :
```
Create Database
set your .env file

In you terminal :

$ git clone https://github.com/julien-castillo/hypnos.git
$ composer install
$ php artisan migrate --seed
$ php artisan storage:link
$ php artisan serve

You can login as an admin with :
Login : admin@admin.fr
Password : admin

You can login as a manager with :
Login : manager1@manager.fr or manager2@manager.fr .... -> manager7@manager.fr
Password : manager

You can login as a user with :
Login : user1@user.fr or user2@user.fr
Password : user

```

<a name="prod"></a>
### Public deployment
For a public deployment; please do these different steps :
```
Clone the project in your cPanel:
https://github.com/julien-castillo/hypnos.git

In you terminal :

$ composer install
$ php artisan migrate --seed
$ php artisan storage:link
```
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
* [Mysql] Version 5.7.34
  <a name="docs"></a>
### Docs
* Graphic Chart & wireframes :
[Document.pdf](https://github.com/julien-castillo/hypnos/blob/master/Charte_Graphique_Hypnos.pdf)
* Maquettes :
[Document.pdf](https://github.com/julien-castillo/hypnos/blob/master/Maquettes%20_%20ECF_Studi_HYPNOS.pdf)
