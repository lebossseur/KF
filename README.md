# KF BUSINESS &amp; INFORMATIQUE - Site Web

Site web professionnel pour KF Business &amp; Informatique développé en PHP/MySQL.

## Description

Site internet moderne et responsive présentant les services de KF Business &amp; Informatique, incluant :
- Page d'accueil avec présentation des services
- Page "Qui sommes nous" détaillant l'entreprise et ses valeurs
- Page Services avec détails des offres
- Page Contact avec formulaire fonctionnel

## Technologies Utilisées

- **Frontend**: HTML5, CSS3, JavaScript
- **Backend**: PHP 7.4+
- **Base de données**: MySQL 5.7+ / MariaDB
- **Framework CSS**: Custom avec Font Awesome
- **Design**: Responsive (mobile-first)

## Prérequis

- Serveur web (Apache/Nginx)
- PHP 7.4 ou supérieur
- MySQL 5.7 ou supérieur / MariaDB
- Extension PHP PDO activée

Pour un environnement de développement local, vous pouvez utiliser :
- XAMPP
- WAMP
- MAMP
- Laragon

## Installation

### 1. Configuration du serveur

Placez les fichiers dans le répertoire racine de votre serveur web :
- XAMPP: `C:\xampp\htdocs\kf_business`
- WAMP: `C:\wamp\www\kf_business`
- MAMP: `/Applications/MAMP/htdocs/kf_business`

### 2. Création de la base de données

1. Ouvrez phpMyAdmin (`http://localhost/phpmyadmin`)
2. Importez le fichier `database.sql` :
   - Cliquez sur "Importer"
   - Sélectionnez le fichier `database.sql`
   - Cliquez sur "Exécuter"

Ou via la ligne de commande :
```bash
mysql -u root -p &lt; database.sql
```

### 3. Configuration de la connexion à la base de données

Modifiez le fichier `includes/config.php` si nécessaire :

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');           // Votre utilisateur MySQL
define('DB_PASS', '');               // Votre mot de passe MySQL
define('DB_NAME', 'kf_business');
```

### 4. Configuration du site

Ajustez les informations du site dans `includes/config.php` :

```php
define('SITE_NAME', 'KF BUSINESS &amp; INFORMATIQUE');
define('SITE_EMAIL', 'service-client@kfbusiness.ci');
define('SITE_PHONE', '+225 0555206034');
```

### 5. Permissions des fichiers

Assurez-vous que les permissions sont correctes :
- Fichiers PHP : 644
- Répertoires : 755

## Structure du Projet

```
kf_business/
│
├── css/
│   └── style.css           # Styles CSS personnalisés + Slider
│
├── js/
│   └── slider.js           # Script du slider automatique
│
├── images/                 # Images du slider
│   ├── Component 2.png
│   ├── Component 3.png
│   ├── Component 4.png
│   ├── Component 5.png
│   └── Component 6.png
│
├── includes/
│   ├── config.php         # Configuration et connexion BDD
│   ├── header.php         # En-tête réutilisable
│   └── footer.php         # Pied de page réutilisable
│
├── admin/                 # Interface d'administration
│   ├── login.php          # Page de connexion admin
│   ├── dashboard.php      # Tableau de bord
│   └── logout.php         # Déconnexion
│
├── index.php              # Page d'accueil avec slider
├── qui-sommes-nous.php    # Page "Qui sommes nous"
├── services.php           # Page des services
├── contact.php            # Page de contact avec formulaire
├── test-slider.html       # Page de test du slider
├── database.sql           # Script de création de la BDD
├── .htaccess              # Configuration Apache/Sécurité
├── README.md              # Documentation principale
├── SLIDER-README.md       # Documentation du slider
└── DEMARRAGE-RAPIDE.md    # Guide de démarrage rapide
```

## Fonctionnalités

### 🎬 Slider Automatique (Nouveau!)

La page d'accueil intègre maintenant un **slider d'images automatique** avec :
- ✅ 5 images en rotation automatique (5 secondes)
- ✅ Navigation par boutons fléchés (gauche/droite)
- ✅ Indicateurs de position cliquables (dots)
- ✅ Support clavier (flèches ←→)
- ✅ Support tactile (swipe sur mobile)
- ✅ Pause automatique au survol
- ✅ Transitions fluides et professionnelles
- ✅ 100% responsive

**Documentation complète :** Voir `SLIDER-README.md`
**Démarrage rapide :** Voir `DEMARRAGE-RAPIDE.md`
**Test du slider :** Ouvrir `test-slider.html`

### Pages principales

1. **Accueil** (`index.php`)
   - Hero section avec slider automatique (5 images)
   - Présentation des services principaux
   - Section "Pourquoi nous choisir"
   - Call-to-action

2. **Qui sommes nous** (`qui-sommes-nous.php`)
   - Histoire de l'entreprise
   - Valeurs fondamentales
   - Mission et vision
   - Présentation de l'équipe

3. **Services** (`services.php`)
   - Description détaillée de tous les services
   - Services complémentaires
   - Processus de travail en 4 étapes

4. **Contact** (`contact.php`)
   - Informations de contact
   - Formulaire de contact fonctionnel
   - FAQ
   - Validation des données
   - Enregistrement en base de données

### Base de données

La base de données comprend les tables suivantes :

- **contacts** : Messages du formulaire de contact
- **services** : Gestion dynamique des services
- **testimonials** : Témoignages clients
- **portfolio** : Projets réalisés
- **admin_users** : Utilisateurs administrateurs
- **newsletter_subscribers** : Abonnés à la newsletter
- **settings** : Paramètres du site
- **activity_logs** : Logs d'activité

### Utilisateur administrateur par défaut

- **Username**: admin
- **Password**: admin123
- **IMPORTANT**: Changez ce mot de passe après la première connexion !

## Utilisation

### Accéder au site

Ouvrez votre navigateur et accédez à :
```
http://localhost/kf_business/
```

### Tester le formulaire de contact

1. Allez sur la page Contact
2. Remplissez le formulaire
3. Les messages sont enregistrés dans la table `contacts`
4. Consultez-les via phpMyAdmin ou créez une interface d'administration

## Personnalisation

### Modifier les couleurs

Les couleurs principales sont dans `css/style.css` :
- Bleu principal : `#3498db`
- Bleu foncé : `#2980b9`
- Rouge (bouton devis) : `#e74c3c`

### Ajouter des pages

1. Créez un nouveau fichier PHP (ex: `nouvelle-page.php`)
2. Incluez le header et footer :
```php
&lt;?php
require_once 'includes/config.php';
$page_title = 'Titre de la page';
include 'includes/header.php';
?&gt;

&lt;!-- Votre contenu ici --&gt;

&lt;?php include 'includes/footer.php'; ?&gt;
```
3. Ajoutez le lien dans `includes/header.php`

### Modifier le menu de navigation

Éditez le fichier `includes/header.php`, section `.nav-menu`

## Sécurité

- Validation des entrées utilisateur avec `htmlspecialchars()`
- Utilisation de requêtes préparées PDO
- Protection contre les injections SQL
- Validation des emails avec `filter_var()`

**Recommandations** :
- Changez les identifiants de base de données par défaut
- Utilisez HTTPS en production
- Créez un fichier `.htaccess` pour protéger les fichiers sensibles
- Sauvegardez régulièrement la base de données

## Support et Contact

Pour toute question ou assistance :
- Email : service-client@kfbusiness.ci
- Téléphone : +225 0555206034

## Licence

© 2025 KF Business &amp; Informatique. Tous droits réservés.

## Auteur

Développé pour KF Business &amp; Informatique

---

**Date de création** : 2025
**Version** : 1.0.0
