# Gov-Pay Client

Ce package permet d'ingréer la palteforme de payement mobile de l'administration publique (Gov-Pay) du Burkina dans un e-service donné.

## Installation

A travers Composer

``` bash
$ composer require abdazz/gov-pay-client
```

## Configuration

### Etape 1
``` bash
$ php artisan vendor:publish --provider="Abdazz\GovPayClient\GovPayClientServiceProvider"
```

### Etape 2
La commande ci-dessus a publié le fichier payement config dans votre dossier config.
Ouvrez le fichier payement.php et renseignez les différents paramètres de configuration.
Si vous rencontrez des difficultés avec les paramètres, veuillez contacter l'adminitrateur de Gov-Pay pour plus de renseignements.

### Etape 3
Soumettre une demande de payement
``` bash
 http://localhost:8000/demande
```


## Securité

Si vous rencontrez un problème fonctionnel ou sécuritaire avec ce package, veuillez contactez l'administrateur de Gov-Pay ou envoyez un e-mail à abdoulazizzorom@gmail.com
