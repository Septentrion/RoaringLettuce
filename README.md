# Roaring Lettuce

Projet pédagogique d'application de gestion de commerce « _en circuit court_ » de type AMAP.

Cette application est destinée à présenter diverses facettes de **Laravel**.

Des supports pour un cours sur Laravel, en lien avec cette application, sont disponible sur le dépôt [coursLaravel](https://github.com/Septentrion/coursLaravel).

Ceci est un « _work in progress_ », non destiné à être une application réaliste, mais simplement à exposer quelques démonstrations de fonctionnalités de **Laravel**. Le dépôt ne contient pas l'application complète, mais seulement le code quicorrespond au cours. Vous devrez donc installer Laravel indépendamment.

Vous pourrez trouver aussi un diagramme de classes UML représentant le modèle du domaine de l'application.



<hr/>

## Les styles

Une feuille de styles minimale est disponible dans le dossier `/assets/css`. Elle est « compilée » avec Mix par l'intermédiaire de la commande :
```shell
npm run dev
```

## Les gabarits Blade

Les gabarits sont, comme on peut s'y attendre, dans le dossier `resources/views`. Il y a une mise en page globale dans le fichier `layout.blade.php`, à laquelle tous les autres gabarits (des différentes vues) de réfèrent.


## Le modèle

### Les entités (ou modèles)

Le dossier `/app/Models` contient toutes les classes implémentant le modèle de données.

Ces classes implémentent divers types d'associations et notamment ce que Laravel appele des associations « _polymorphes_ ».

### Les migrations

Le dossier `/database/migrations` contient toutes les phases de création du schéma de la base de données. Le code des migrations n'est pas engendré par Laravel ; de ce fait les méthodes `down()`n'ont pas été implémentées de manière précise. Pour créer le schéma de la base de données :

```shell
./artisan migrate
```

### Les données factices

Vosu trouverez dans les deux dossiers `/database/seeders` et `/database/factories` les classes permettant d'engendrer des données factices (pour des tests ou d'autres besoins). Les « _factories_ » contiennent les contraintes pour créer les objets (en particulier en utilisant la bibliothèque `FakerPHP`) et les « _seeders_ » exécutent le processus de création. Pour créer les données :
```shell
./artisan db:seed 
```

## Le cycle de base des requêtes

### Le routage

Vous trouverez dans le dossier `/routes` divers groupes de routes. On ne s'occupe ici que du groupe `web` qui concerne les applications web. 

Les routes montrent quelques exemples de méthodes HTTP différentes, ainsi que l'utilisation de « _middlewares_ ».

### Les contrôleurs

Le dossier `app/Http/Controllers` contient diverses classes de contrôleurs pour les fonctionnalités fondamentales de l'application. En créant les classes avec l'option `--resource`, vous créerez les méthodes génériques du CRUD, ce qui n'est pas le cas sinon.

## Les formulaires

### Validation de données

Vous trouverez dans le dossier `app/Http/Request` des classes implémentant la logique de validation des données de formulaires. Bien que cette logique puisse être directement intégrée dans les contrôleurs, il semble une meilleure pratique de séparer les deux.

Dans le dossier `app\Rules`, vous trouverez une classe `SanitizeText`, qui est une règle de validattion personnalisée, qui est utilisée pour valider les textes saisis par les utilisateurs. Un exemple est donné dans `StoreProducttypeRequest`, qui teste le types de produits.


## La gestion des utilisateurs

### Authentification

Le dossier `app/Controllers/Auth` contient une procédure d'authentification minimale (il manque quelques fonctionnalités comme la perte de mot de passe).

Dans le fichier `routes/web.php`, vous verrez un exemple de redirection automatique avec le middleware `auth`.

> **Note** `auth` est le middleware qui gère l'authentification, par le biais de `guards`. Cela permet notamment l'authentification multiple (plusieurs catégories d'utilisateurs, ou plusieurs modes d'accès à l'application)

### Autorisation (droits d'accès)

La gestion des droits d'accès peut être faite par plusieurs canaux.

#### Gates et Policies

Tout d'abord en créant des objets `Gate` qui définissent un filtre d'accès (principalement par son nom) et renvoient vers une procédure. Cesq `Gate`sont définis dans le fichier `app/Providers/AuthServiceProvider.php`.

Les procédures (règles) de filtrage peuvent être implémentées dans des `Policies`. Vous trouverez deux exemples dans le dossier `app/Policies`.

Le filtrage est effectué en interrogeant le `Gate`(-keeper) dans le contrôleur qui gère l'accès (par exempple avec la méthode `allows`). Le cycle est donc mis en œuvre avant que l'autorisation soit donnée ou refusée

#### Middleware

Le « middleware » (intergiciel en français) traite la requête entre sa réception et l'initialisation du cycle de la requête. Il avorte celle-ci beaucoup plus tôt dans la chaîne des traitements.

Le _middleware_ joue d'autres rôles ue la gestion des droits :
- authentification
- transformations et préparations diverses de données de la requête

Vous trouverez :
- dans le fichier `routes/web.php` un exemple de gestion de droits réemployant une `Policy` avec le middleware `can`, ainsi qu'un exemple d'application de vérifications multiples.
- dans le dossier `app/Http/Middleware` un classe « ad hoc » restreignant l'accès à certaines fonctions aux `Producer`.