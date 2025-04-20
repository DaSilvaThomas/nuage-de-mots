<?php
    require 'traitement.php';  // Liens vers le fichier php pour les traitements
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuage de mots</title>
    <link rel="stylesheet" href="style.css">  <!-- Liens vers le fichier css pour le style -->
    <!-- Liens vers la police d'écriture "Parkinsans" -->
    <link href="https://fonts.googleapis.com/css2?family=Parkinsans&display=swap" rel="stylesheet">
    <script>
        // Transfère du tableau associatif vers JavaScript
        const tagList = <?php echo json_encode($tableau_associatif_js); ?>;
        console.log(tagList);
    </script>
</head>
<body>

    <content>
        <!-- Titre et logo -->
        <div class="container_titre">
            <img src="img/logo_nuage.jpg"></img>
            <h1>Nuage de mot</h1>
        </div>

        <!-- Texte d'introduction -->
        <div class="container_introduction">
            <p>
                Bienvenue sur mon générateur de nuages de mots-clés ! 
                Ce site vous permet de visualiser les mots les plus importants ou fréquents d’un texte sous forme de nuage interactif. 
                Pour commencer, saisissez ou collez un texte dans la zone dédiée, ou importez un fichier texte (.txt). 
                Une fois le contenu fourni, un nuage de mots s'affichera automatiquement dans le canvas, mettant en avant les mots-clés essentiels. 
                Simple et intuitif, ce service est idéal pour analyser rapidement un texte ou créer une représentation graphique unique.
            </p>
        </div>

        <!-- Formulaire de saisie -->
        <form class="formulaire" method="post" action="index.php">
            <label class="label_inserez_texte" for="content">Inserez du texte :</label><br>
            <textarea id="content" name="content" placeholder="Tapez votre texte ici !"></textarea><br>
            <div>
                <button type="submit">Envoyer</button>
            </div>
        </form>

        <!-- Charger un fichier -->
         <div class="charger_fichier">
            <p class="selectionner_fichier">Sélectionner un fichier :</p>
            <div class="container_impoter">
                <form id="formulaire" action="index.php" method="post" enctype="multipart/form-data">
                    <label for="file" class="bouton_importer">
                        Importer
                    </label>
                    <input type="file" name="file" id="file" accept=".txt" onchange="parcourir()" style="display: none;">
                </form>
                <p class="attention">Attention : Uniquement les fichier texte (.txt) sont acceptés !</p>
            </div>
        </div>

        <!-- Affichage du nuage de mot -->
        <div class="container_canvas">
            <p class="titre_affichage">Résultat !</p>
            <canvas id="canvas" width="760" height="760"></canvas>  <!-- canvas qui va contenir le nuage de mot -->
        </div>
    </content>

    <script src="wordcloud2.js-gh-pages/src/wordcloud2.js"></script>  <!-- Ajout de la bibliothèque wordcloud2 -->
    <script src="script.js"></script>  <!-- Liens vers le fichier js -->
</body>
</html>