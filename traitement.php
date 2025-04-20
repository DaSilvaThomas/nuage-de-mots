<?php
    $tableau_associatif_js = [];
    $texte = '';
    
    // Charger le contenue du texte du formulaire
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['content'])) {
            $texte = $_POST['content'];
        }
    }

    // Charger le fichier contenant le texte
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            $chemin_fichier = $_FILES['file']['tmp_name'];
            $texte = file_get_contents($chemin_fichier);
        }
    }

    // Exécution du code si la variable $texte n'est pas vide
    if (!($texte == "")) {
        // Charger le fichier contenant la liste des mots non intéressants
        $fichier_stopwords = file_get_contents('data/stopwords.txt', true);

        // Tokenisation du texte
        $array_mots = explode(" ", $texte);
        $array_stopwords = explode("\n", $fichier_stopwords);

        // Fonction pour supprimer les accents et les caractères non alphabétiques
        function nettoyage($mot) {
            // Suppression des accents
            $mot = str_replace(
                ['é', 'è', 'ê', 'ë', 'à', 'â', 'ä', 'î', 'ï', 'ô', 'ö', 'ù', 'û', 'ü', 'ç', 'É', 'È', 'Ê', 'Ë', 'À', 'Â', 'Ä', 'Î', 'Ï', 'Ô', 'Ö', 'Ù', 'Û', 'Ü', 'Ç'],
                ['e', 'e', 'e', 'e', 'a', 'a', 'a', 'i', 'i', 'o', 'o', 'u', 'u', 'u', 'c', 'E', 'E', 'E', 'E', 'A', 'A', 'A', 'I', 'I', 'O', 'O', 'U', 'U', 'U', 'C'],
                $mot
            );
            $mot = preg_replace("/[^a-zA-Z'\s]/", '', $mot);  // Suppression des caractères non alphabétiques
            $mot = preg_replace("/(.)'/", '', $mot);  // Suppression des apostrophe et du caractère situé devant
            return $mot;
        };
        
        // Suppression des espaces
        $array_mots = array_map('trim', $array_mots);
        $array_stopwords = array_map('trim', $array_stopwords);

        // Mettre le texte en minuscule
        $array_mots = array_map('strtolower', $array_mots);
        
        // Suppression des accents et des caractères non alphabétiques
        $array_mots = array_map('nettoyage', $array_mots);
        $array_stopwords = array_map('nettoyage', $array_stopwords);

        // Nettoyage des mots inutiles
        $array_mots = array_diff($array_mots, $array_stopwords); // Compare les deux tableaux et supprime les mots identiques aux "stop words" dans $array_mots
        $array_mots = array_values($array_mots); // Supprime tous les indices vides
        
        // Compter le nombre d'occurence de chaque mot
        $occurence_mots = array_count_values($array_mots); // Retourne un tableau associatif (clé - valeur)

        // Trier les valeurs d'occurences (et les clés assciées) par ordre décroissant
        arsort($occurence_mots);

        // Découper le tableau associatif
        $occurence_mots = array_slice($occurence_mots, 0, 60); // Ne garder que les 30 premiers mots

        // Convertion du tableau associatif php en js
        foreach ($occurence_mots as $cle => $valeur) {
            $tableau_associatif_js[] = [$cle, $valeur];
        }
    }
?>