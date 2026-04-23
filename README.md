# Nomade Media — Bassin d'Arcachon

Site du média Nomade, agence média du Bassin d'Arcachon.
Bons plans, événements, spots, soirées.

## Stack

- PHP 8+ (pages standalone)
- CSS custom (pas de framework)
- JS vanilla (IntersectionObserver, parallax)
- Déployé sur o2switch (file manager)

## Pages

- `index.php` — accueil (hero, bons plans weekend, spots par catégorie, Instagram, Spotify)
- `evenements.php` — liste complète des événements
- `spots.php` — liste complète des spots avec filtres par catégorie
- `communaute.php` — groupes WhatsApp
- `mentions-legales.php` / `politique-confidentialite.php` / `cgu.php`

## Structure

```
nomade/
├── index.php
├── evenements.php
├── spots.php
├── communaute.php
├── mentions-legales.php
├── politique-confidentialite.php
├── cgu.php
├── includes/
│   ├── header.php
│   ├── footer.php
│   └── data.php        ← événements, spots, groupes (source à remplacer par DB)
└── assets/
    ├── css/style.css
    ├── js/main.js
    └── img/
```

## Lancer en local

```bash
cd nomade
php -S localhost:8000
```

Puis ouvrir http://localhost:8000

## Direction artistique

- **Pervenche** `#8BA0C8` (logo) — principal
- **Sable** `#F5E6D3` — fond
- **Sunset** `#FF9A6B` — accent
- **Pin** `#3E5C4A` — secondaire
- Typos : Fraunces (display), Inter (texte), Caveat (manuscrit)

## TODO

- [ ] Remplacer les liens WhatsApp placeholder par les vrais
- [ ] Récupérer la vraie playlist Spotify et mettre l'ID
- [ ] Ajouter un back-office léger pour modifier events/spots sans toucher au PHP
- [ ] Brancher le formulaire de contact
- [ ] Import des vraies photos (remplacer les Unsplash)

## Instagram

👉 [@nomademediacom](https://www.instagram.com/nomademediacom)
