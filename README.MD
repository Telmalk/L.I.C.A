# La Ligue Internationale des Combats d'Aliens (LICA) 🚀

## Concept

Plateforme de paris sur des combats d'aliens avec un système d'adoption d'aliens combattants.

## Fonctionnalitées

### V1

- Paris sur les combats
- Adoption de futurs combattants
- Cryptomonnaie ou du fake money
- Bestiaire avec description des diffèrents aliens
- Gestion de compte utilisateur

### V1.*

- Simulateur de combats
- Système de championnat (avec diffèrentes catégories)
- Chat entre propriétaire d'aliens


## Marketing

### Benchmark 
#### Liens utiles
 * https://www.la-spa.fr/adopter-animaux
 * http://fr.ufc.com/fighter
 * https://wiki.halo.fr/Bestiaire

#### Reglement
* http://legisquebec.gouv.qc.ca/fr/ShowDoc/cr/S-3.1,%20r.%2011
* http://www.fsgt.org/sites/default/files/R%C3%A8glement%20f%C3%A9d%C3%A9ral%20des%20Sports%20de%20Combat%20CFA%20SCAM%20_%20MAJ%2008avril2015.pdf
* https://www.ontario.ca/fr/page/reglements-et-frais-en-matiere-de-sports-de-combat

### Targets

## Technos
* PHP 7.2 | Symfony
* ES6 | TypeScript <- parce les langages typé c'est bien quand meme 
* mySql

## Structure du site

### Page d'accueil/landing page (Index)(Informations et règles)

* Présentation du site (qui sommes nous ?)
* Explication du concept et comment s'en servir
* Commentaire de personne qui ont déjà utiliser le site
* 

### Page utilisateur (espace perso)

### Page des règles complètes

### Page des combats (calendrier/infos) & Page des paris (accessible depuis les combats)

### Page du bestiaire sous formes de "cartes" avec le système d'adoption

### Page admin


## Data structure
### Admin
* id {int primary key}
* name {string}
* password {string hashed}

### User
* id {int primary key}
* name {string}
* surname {string}
* password {string hashed}
* pseudo {string}
* birthdate {date}
* mail {string}
* creditCode {string}
* nbCredit {int}
* win {int}
* draw {int}
* defeat {int}

### Alien
* id_alien {int primary key}
* id_user -> User(id)
* weight {int}
* height {int}
* sex {string}
* origin {string}
* attack {int}
* defense {int}
* threat {int}
* decsription_card {string}
* trait {string}
* win {int}
* draw {int}
* defeat {int}
* state {bool}

### bet
* id_pari
