# PWA - Disponibilité des parcs-relais TCL SYTRAL

### Description

Page web [VueJS](https://vuejs.org/) pouvant être installée comme Progressive Web App (PWA) afin de consulter les disponibilités des Parcs Relais du réseau de transports publics TCL SYTRAL (Métropole de Lyon).

L'application propose de définir une liste de parcs-relais à afficher sur la page d'accueil et récupère le nombre de places disponibles.
Un code couleur permet de rapidement savoir le taux de remplissage (vert jusqu'à 90%, orange au delà, rouge si le parc est complet).

Une barre de recherche permet de filtrer rapidement la liste de tous les parcs relais ou de ceux listés en favoris.
Le rafraîchissement des données est uniquement manuel (via un bouton ou en rafraîchissant la WebView).

### Démonstration

Ce dépôt GitHub contient tous les éléments pour héberger la PWA sur son propre serveur, pour peu qu'il permette d’exécuter PHP. Pour autant, vous pouvez tester l'application via [ce lien](https://www.eredrim.fr/parcs-relais-tcl/) hébergé sur mon propre site.

### Informations techniques

Pour installer la PWA, il suffit de transférer le contenu du dépôt GitHub sur n'importe quel serveur exécutant PHP (version 7+).

L'accès aux données se fait via un compte sur [data.grandlyon.com](https://data.grandlyon.com). Une fois le compte créé, les identifiants doivent être reportés dans les variables `$account_email` et `$account_pwd` du fichier [data.php](data.php).

Afin que la PWA fonctionne, il est nécessaire de disposer d'une connexion HTTPS valide (avec un certificat signé et reconnu par le navigateur). Le fichier [.htaccess](.htaccess) du dépôt permet justement de forcer l'utilisation du HTTPS, mais aussi de réécrire les URLs sans extension de fichier pour qu'elles pointent vers les fichiers `.php` et `.html`. En cas d'utilisation d'un autre serveur web, ces règles de réécriture devront être mises en place.