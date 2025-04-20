# Nuage de Mots

## Description du Projet

Ce projet est une application web permettant de générer des **nuages de mots** interactifs. L'utilisateur peut saisir du texte ou importer un fichier texte pour obtenir une représentation graphique des mots les plus fréquents. Les mots peu pertinents (stop words) sont filtrés automatiquement pour se concentrer sur les termes significatifs.

## Fonctionnalités

- **Saisie directe de texte** : Un formulaire permet de coller ou d'écrire un texte directement sur le site.
- **Import de fichiers texte** : Possibilité de télécharger un fichier `.txt` pour générer un nuage de mots.
- **Filtrage des mots inutiles** : Une liste de stop words est utilisée pour ignorer les mots courants (comme *le*, *la*, *de*).
- **Personnalisation graphique** : Le nuage de mots utilise une bibliothèque JavaScript (`wordcloud2.js`) pour un affichage dynamique et esthétique.

## Arborescence du Projet

```plaintext
nuageDeMots_V2/
│
├── index.php                # Point d'entrée principal de l'application
├── traitement.php           # Script PHP pour le traitement des données
├── script.js                # Logique JavaScript pour le nuage de mots
├── style.css                # Feuille de style pour le design du site
│
├── img/
│   └── logo_nuage.jpg       # Logo utilisé dans la page web
│
├── data/
│   ├── stopwords.txt        # Liste des mots à exclure
│   ├── texte_abeilles.txt   # Exemple de fichier texte
│   └── texte_pyramides.txt  # Exemple de fichier texte
│
└── wordcloud2.js-gh-pages/  # Bibliothèque WordCloud
```

## Prérequis

- Serveur web prenant en charge PHP (Apache, Nginx, XAMPP/WAMP, etc.).
- Navigateur moderne avec prise en charge de JavaScript.

## Instructions d'Installation

1. **Téléchargement** : Récupérez le projet sous forme d'archive ZIP.
2. **Décompression** : Extrayez le contenu dans un répertoire accessible par votre serveur web.
3. **Configuration** : Assurez-vous que les fichiers et répertoires ont les bonnes permissions pour l'exécution et l'écriture.
4. **Accès** : Accédez à `index.php` via votre navigateur.

## Utilisation

1. **Saisie manuelle** :
   - Rendez-vous sur la page principale.
   - Saisissez ou collez un texte dans la zone prévue.
   - Cliquez sur "Envoyer" pour afficher le nuage de mots.
   
2. **Import de fichier** :
   - Cliquez sur "Importer" pour sélectionner un fichier `.txt`.
   - Le nuage de mots s’affiche automatiquement après le chargement.

3. **Affichage du résultat** :
   - Le nuage de mots s’affiche sur un canvas interactif, les mots sont dimensionnés selon leur fréquence.

## Technologies Utilisées

- **Frontend** :
  - HTML5, CSS3 pour le design et la mise en page.
  - JavaScript (`wordcloud2.js`) pour l’affichage dynamique.

- **Backend** :
  - PHP pour le traitement du texte (extraction, filtrage, comptage des mots).
  
- **Données** :
  - Fichiers texte pour les contenus d’exemple et les stop words.

## Bibliothèques et Ressources Externes

- [WordCloud2.js](https://github.com/timdream/wordcloud2.js) : Générateur de nuages de mots.
- [Google Fonts](https://fonts.google.com/specimen/Parkinsans) : Police "Parkinsans" pour le design.

## Fichiers d'Exemple

- **texte_abeilles.txt** : Exemple de texte sur les abeilles.
- **texte_pyramides.txt** : Exemple de texte sur les pyramides.

## Auteur

Thomas DA SIVLA.
Master 1 Informatique parcours Big Data de l'université de Paris 8 Vincennes Saint-Denis.
