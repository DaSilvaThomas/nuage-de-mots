// Fonction pour envoyer le fichier une fois sélectionné
function parcourir() {
    document.getElementById('formulaire').submit();
}

// Vérification du chargement du DOM
document.addEventListener("DOMContentLoaded", async () => {
    await document.fonts.ready;  // Charger toute les polices d'écritures avant d'afficher le nuage de mot
    const canvas = document.getElementById('canvas');  // Stockage du canvas dans une variable
    
    // Calcul du weightFactor en fonction de la fréquence moyenne de chaque mot
    const liste_frequence = tagList.map(([mot, occurence]) => occurence);  // Création d'une liste des fréquences de chaque mot
    let somme_frequence = 0;
    for (let i = 0; i < liste_frequence.length; i++) {
        somme_frequence += liste_frequence[i];  // Calcule de la somme de la fréquence des mots
    };
    const frequence_moyenne = somme_frequence / liste_frequence.length;
    const taille_cible = 30;
    const weightFactor = taille_cible / frequence_moyenne;

    // Utilisation de WordCloud pour créer le nuage de mot
    WordCloud(canvas, {
        list: tagList,
        gridSize: 6,  // Espacement des mots
        weightFactor: weightFactor,  // Taille des mots en fonction de leurs fréquence dans le texte
        maxFontSize: 1,  // Taille maximal d'un mot
        clearCanvas: true,
        fontFamily: 'Parkinsans, sans-serif',
        color: 'random-dark',
        backgroundColor: '#ffffff',
        drawOutOfBound: false,
        shape: 'circle',
        rotateRatio: 0.3,  // Inclinaison des mots
        shuffle: true,
        ellipticity: 1,  // Pour un cercle parfait
    });
});