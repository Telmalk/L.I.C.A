# L.I.C.A

# Cahier Technique

Groupe 13 / Explorer404

## **I. - Table des matières**

## **II. - Introduction**

### 2.1 Objectifs

Mettre en place une plateforme de paris sur des combats d'aliens avec plusieurs possibilités :
        - Adopter ses propres combattants
        - Miser sur les prochains combats prévus
        - Défier d'autres propriétaires d'aliens


### 2.2 Définitions, acronymes, glossaire

* L.I.C.A : Ligue Intergalactique des Combats d'Aliens

## **III. - Description d'ensemble**

### 3.1 Choix techniques

#### 3.1.1 Base de données

Nous avons eu besoin de mettre en place 5 tables dans notre base de données, telles que:
````
- admin
- user
- alien
- fight
- bet
````

#### 3.1.2 Solution back-end

* Symfony
* Twig

#### 3.1.3 Solution front-end

* HTML5
* SCSS (compilé avec le logiciel WebStorm)
* Javascript Natif

### 3.2 Dépendances

````json
"php": "^7.1.3",
        "ext-iconv": "*",
        "easycorp/easyadmin-bundle": "^1.17",
        "sensio/framework-extra-bundle": "^5.1",
        "symfony/asset": "^4.1",
        "symfony/console": "^4.1",
        "symfony/expression-language": "^4.1",
        "symfony/flex": "^1.0",
        "symfony/form": "^4.1",
        "symfony/framework-bundle": "^4.1",
        "symfony/lts": "^4@dev",
        "symfony/monolog-bundle": "^3.1",
        "symfony/orm-pack": "^1.0",
        "symfony/process": "^4.1",
        "symfony/security-bundle": "^4.1",
        "symfony/serializer-pack": "*",
        "symfony/swiftmailer-bundle": "^3.1",
        "symfony/twig-bundle": "^4.1",
        "symfony/validator": "^4.1",
        "symfony/web-link": "^4.1",
        "symfony/webpack-encore-pack": "*",
        "symfony/yaml": "^4.1"
    },
    "require-dev": {
        "symfony/debug-pack": "*",
        "symfony/dotenv": "^4.1",
        "symfony/maker-bundle": "^1.0",
        "symfony/profiler-pack": "*",
        "symfony/test-pack": "^1.0",
        "symfony/web-server-bundle": "^4.1"
````

## **IV. - Base de données**

### 4.1 Définitions des entités

* Admin
````
id {int primary key}
name {string}
password {string hashed}
````
* User
````
id_user {int primary key}
name {string}
surname {string}
password {string hashed}
pseudo {string}
birthdate {date}
mail {string}
creditCode {string}
nbCredit {int}
win {int}
defeat {int}
pendingFight {bool}
rating {int}
img_user {string}
````
* alien
````
id_alien {int primary key}
id_user -> User(id){int foreign key}
race {string}
weight {int}
height {int}
sex {string}
origin {string}
nutrition {string}
attack {int}
defense {int}
speed {int}
threat {int}
description_card {string}
trait {string}
win {int}
defeat {int}
healthStatus {string}
adopted {bool}
rating {int}
price {int}
img {string}
````
* fight
````
id_fight {int primary key}
id_user1 -> Alien(id_user) {int foreign key}
id_user2 -> Alien(id_user) {int foreign key}
id_alien1 -> Alien(id_alien) {int foreign key}
id_alien2 -> Alien(id_alien) {int foreign key}
bet {int}
odd_fighter1 {int}
odd_fighter2 {int}
date {DATETIME}
accepted {bool}
winner {int}
````
* bet
````
id_betUser {int primary key}
id_user -> User(user_id) {many to one}
id_fight -> Fight(id_fight) {many to one}
betTarget -> (int) {1 or 2}
wager {int}
````

### 4.3 Projection de volumétrie

[reference link](https://i.imgur.com/WqFJtuf.png)

## **VI. - Sécurité**

### 5.1 Etudes des risques

Le système d'adoption et de paris nécessitent de créditer son compte, cela reste la partie la plus sensible.

### 5.2 Solutions

La mise en place d'une monnaie virtuelle dépendante de notre site facilite la gestion des achats et paris.
Pour la protection des données, nous avons mis en place un système de comptes admins pouvant gérer la base de données.

## **VII. - Installation et déploiement**

### 6.1 Installation

* CLI 
````zsh
make migrate
cd lica
composer install
./bin/console server:start
````
### 6.2 Déploiement

* Nom de domaine
````
licaonline.space
````
