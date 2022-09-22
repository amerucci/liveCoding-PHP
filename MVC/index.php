<?php
// Ici nous allons définir ce que doit faire notre application en fonction de ce qui est passé dans l'url
// Commençons par un cas simple : 
// Ici nous commençons par dire à notre fichier que s'il ne trouve rien dans l'URL alors il doit affichier un message
// Le case de figure classique quand nous arrivons sur la page d'accueil d'un site internet.
// Puis grace à un switch, nous allons lui dire ce qu'il doit faire en fonction de ce qu'il y à dans l'url
// Et nous définissions aussi ce qu'il doit faire si ce qui se trouve dans l'url ne figue pas dans ses propositions


// if(empty($_GET['page'])){
//     echo "hello there";
// }else{
//     switch($_GET['page']){
//         case "accueil" : echo "tu es sur la page d'accueil";
//         break;
//         case "livres" : echo "tu es sur la page des livres";
//         break;
//         default : echo "404 - Désolé la page ".$_GET['page']." n'existe pas :(";
//     }
// }


// Bon maintenant passons aux choses sérieuses
// Appeler un bout de texte c'est bien mais si l'on pouvait appeler une fonction se serait mieux
// Et c'est la que rentre en application le controller
// Il est considéré comme le chef d'orchestre dans dans toute cette architecture
// En effet il aura pour role de récupérer la demande du client, de la transmettre au model, de récupérer ce qui lui a été retourné et de retourner la vue en conséquence
// Il ne fait en aucun cas d'action de traintement
// Nous allons reprendre notre exemple ci-dessus en l'adaptant 
// Pour l'instant quand l'utilisateur arrive sur le site rien ne changera par contre quand il tapera accueil dans l'url nous voulons que le programme fasse quelque chose par le bien du controller
// Danc première chose à faire appeler le controller

// require_once("./controllers/FrontController.php");

// if(empty($_GET['page'])){
//     echo "hello there";
// }else{
//     switch($_GET['page']){
//         case "accueil" : echo "tu es sur la page d'accueil";
//         break;
//         // Ici maintenant nous allons dire que quand nous sommes sur la page livre nous allons appeler la fonction onPage() présente dans notre FrontController
//         case "livres" : onPage(($_GET['page']));
//         break;
//         default : echo "404 - Désolé la page ".$_GET['page']." n'existe pas :(";
//     }
// }

// Bon déjà l'on peut voir que l'on commence déjà à aller plus loin
// Maintenant nous allons créer notre nouveau model
// Pour cela rendons nous dans le dossier models
// Le Model fait le controller opérationnel définition la condition d'appel

require_once("./controllers/FrontController.php");

if(empty($_GET['page'])){
    homePage();
}else{
    switch($_GET['page']){
        // case "accueil" : homePage();
        // break;
        default : homePage();
    }
}