# Documentation du Slider - KF Business & Informatique

## Description

Le slider automatique affiche les images du dossier `images/` en rotation avec des transitions fluides et des contrôles utilisateur intuitifs.

## Fonctionnalités

### ✅ Défilement Automatique
- Changement automatique toutes les 5 secondes
- Transitions douces et professionnelles (fade in/out)
- Pause automatique au survol de la souris

### ✅ Navigation Manuelle
- **Boutons Fléchés** : Boutons gauche/droite pour naviguer manuellement
- **Indicateurs (Dots)** : Points en bas du slider pour navigation directe
- **Clavier** : Flèches gauche/droite du clavier
- **Tactile** : Support du swipe sur mobile et tablette

### ✅ Responsive
- Adaptation automatique à toutes les tailles d'écran
- Optimisé pour mobile, tablette et desktop
- Contrôles tactiles pour appareils mobiles

## Structure des Fichiers

```
KF/
├── css/
│   └── style.css           # Styles du slider (lignes 143-272)
├── js/
│   └── slider.js           # Logique JavaScript du slider
├── images/
│   ├── Component 2.png     # Image 1 du slider
│   ├── Component 3.png     # Image 2 du slider
│   ├── Component 4.png     # Image 3 du slider
│   ├── Component 5.png     # Image 4 du slider
│   └── Component 6.png     # Image 5 du slider
└── index.php               # Page utilisant le slider
```

## Code HTML du Slider

```html
&lt;section class="hero"&gt;
    &lt;div class="hero-slider"&gt;
        &lt;!-- Slides --&gt;
        &lt;div class="slider-item"&gt;
            &lt;img src="images/Component 2.png" alt="Description" class="hero-image"&gt;
        &lt;/div&gt;

        &lt;!-- Plus de slides... --&gt;

        &lt;!-- Overlay avec contenu --&gt;
        &lt;div class="hero-overlay"&gt;
            &lt;div class="hero-content"&gt;
                &lt;h1&gt;Titre&lt;/h1&gt;
                &lt;p&gt;Description&lt;/p&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/section&gt;

&lt;!-- Script --&gt;
&lt;script src="js/slider.js"&gt;&lt;/script&gt;
```

## Personnalisation

### Changer la Vitesse du Défilement

Éditez `js/slider.js` ligne 7 :

```javascript
this.autoPlayDelay = 5000; // 5000 = 5 secondes
```

Exemples :
- `3000` = 3 secondes (plus rapide)
- `7000` = 7 secondes (plus lent)
- `10000` = 10 secondes

### Ajouter/Supprimer des Images

**Pour ajouter une image :**

1. Placez votre image dans le dossier `images/`
2. Éditez `index.php` et ajoutez un nouveau slide :

```html
&lt;div class="slider-item"&gt;
    &lt;img src="images/nouvelle-image.jpg" alt="Description" class="hero-image"&gt;
&lt;/div&gt;
```

**Pour supprimer une image :**

1. Supprimez le bloc `&lt;div class="slider-item"&gt;...&lt;/div&gt;` correspondant dans `index.php`
2. Le slider s'adaptera automatiquement

### Modifier les Couleurs des Contrôles

Dans `css/style.css` :

**Boutons de navigation (lignes 208-240) :**
```css
.slider-control {
    background: rgba(255, 255, 255, 0.9); /* Fond des boutons */
    color: #2c3e50;                        /* Couleur des icônes */
}

.slider-control:hover {
    background: white;                     /* Fond au survol */
}
```

**Indicateurs (dots) (lignes 253-272) :**
```css
.slider-dot {
    background: rgba(255, 255, 255, 0.5);  /* Fond normal */
    border: 2px solid white;               /* Bordure */
}

.slider-dot.active {
    background: white;                     /* Dot actif */
}
```

### Changer la Hauteur du Slider

Dans `css/style.css` ligne 146 :

```css
.hero {
    height: 500px; /* Hauteur par défaut */
}
```

**Responsive** (ligne 500) :
```css
@media (max-width: 768px) {
    .hero {
        height: 400px; /* Hauteur mobile */
    }
}
```

### Modifier l'Effet de Transition

Dans `css/style.css` ligne 163 :

```css
.slider-item {
    transition: opacity 1s ease-in-out; /* 1s = durée de la transition */
}
```

Options :
- `0.5s` = Transition rapide
- `1.5s` = Transition lente
- `ease-in-out` = Démarrage et fin doux
- `linear` = Vitesse constante
- `ease` = Naturel

### Désactiver le Défilement Automatique

Dans `js/slider.js`, commentez la ligne 21 :

```javascript
// this.startAutoPlay(); // Défilement automatique désactivé
```

### Changer le Type de Transition

**Option 1 : Slide (glissement)**

Dans `css/style.css`, remplacez les lignes 156-168 :

```css
.slider-item {
    position: absolute;
    top: 0;
    left: 100%; /* Commence à droite */
    width: 100%;
    height: 100%;
    transition: left 0.8s ease-in-out;
}

.slider-item.active {
    left: 0; /* Glisse au centre */
}
```

**Option 2 : Zoom**

```css
.slider-item {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    transform: scale(1.2);
    transition: all 1s ease-in-out;
}

.slider-item.active {
    opacity: 1;
    transform: scale(1);
}
```

## Utiliser le Slider sur d'Autres Pages

Pour ajouter le slider à une autre page :

1. Copiez la section hero d'`index.php`
2. Collez-la dans votre page
3. Ajoutez le script avant `&lt;/body&gt;` :

```html
&lt;script src="js/slider.js"&gt;&lt;/script&gt;
```

## Accessibilité

Le slider inclut :
- Attributs `aria-label` pour les contrôles
- Textes alternatifs (`alt`) sur les images
- Navigation au clavier
- Support des lecteurs d'écran

## Performances

### Optimisations Incluses
- Utilisation de `transition` CSS (accélération GPU)
- Pause automatique hors de la vue
- Chargement asynchrone des images

### Optimiser les Images

Pour de meilleures performances :

1. **Compresser les images** :
   - Utilisez [TinyPNG](https://tinypng.com/) ou [ImageOptim](https://imageoptim.com/)
   - Réduisez la taille de fichier sans perte de qualité

2. **Redimensionner** :
   - Largeur recommandée : 1920px
   - Hauteur : proportionnelle (environ 1080px)
   - Format : JPG pour photos, PNG pour graphiques

3. **Formats modernes** :
   - WebP pour un meilleur taux de compression
   - Exemple : `Component-2.webp`

## Dépannage

### Le slider ne fonctionne pas

**Vérifiez :**
1. Le fichier `js/slider.js` existe et est chargé
2. Les images existent dans le dossier `images/`
3. La console du navigateur (F12) pour les erreurs
4. Les chemins des images sont corrects

### Les images ne s'affichent pas

**Solutions :**
1. Vérifiez les chemins dans `index.php`
2. Assurez-vous que les noms de fichiers correspondent exactement
3. Vérifiez les permissions des fichiers

### Les boutons ne sont pas cliquables

**Vérifiez :**
1. Le z-index dans le CSS (doit être élevé)
2. L'overlay ne couvre pas les boutons
3. JavaScript est activé dans le navigateur

### Le slider est trop rapide/lent

Modifiez `autoPlayDelay` dans `js/slider.js` (ligne 7)

## Support Navigateurs

Le slider fonctionne sur :
- ✅ Chrome 90+
- ✅ Firefox 88+
- ✅ Safari 14+
- ✅ Edge 90+
- ✅ Opera 76+
- ✅ Mobiles iOS et Android

## Améliorations Futures Possibles

1. **Lazy Loading** : Charger les images à la demande
2. **Effets Parallax** : Mouvement en profondeur
3. **Vidéos** : Support de vidéos en fond
4. **Textes Animés** : Animation du contenu overlay
5. **Préchargement** : Charger l'image suivante en avance

## Contact

Pour toute question sur le slider :
- Email : service-client@kfbusiness.ci
- Téléphone : +225 0555206034

---

**Version** : 1.0.0
**Date** : 2025
**Auteur** : KF Business & Informatique
