<?php 
// Et nous voici maintenant dans le controller
// Nous prendrons l'habitude de nommer un controller en fonction de son champs d'application
// Exemple si le controller aura pour mission de gérer tout la partir front nous le nommerons FrontController, si c'est pour la partie Admin; AdminController
// Nous commencerons par le nom du controller avec une majuscule suivi du terme Controller avec lui aussi une majuscule.
// Maintenant créons notre première fonction simple

// function onPage($page){
//     echo "vous êtes sur la page $page";
// }


// Très bien maintenant nous allons créer une nouvelle fonction
// Quand le routeur l'appelera le controller ira chercher une méthode de notre classe et récupérera celle ci
// Comme nous allons devoir utiliser un model il va falloir l'appeler

// require_once('./models/Books.php');

// function homePage(){
//     $home = new Books;
//     var_dump( $home->getAllBooks());
// }

// Très bien, nous arrivons à recupérer les résultats maintenant nous allons faire en sorte de les afficher

// require_once('./models/Books.php');

// function homePage(){
//     $home = new Books;
//     $books = $home->getAllBooks();
//     require(__DIR__ . "/../views/homePage.php");

// }

// Alors la on est pas mal mais le soucis c'est que quand nous entrons dans le détail la page se recharge, nous alons devoir créer une nouvelle.
// Cependant nous allons pas nous amuser à chaque fois à rappeler toute la structure de la page
// C'est pourquoi nous allons voir comment créer une structure globale et n'afficher dedans que ce dont nous avons besoin en fonction des cas de figue.

require_once('./models/Books.php');

function homePage(){
    $home = new Books;
    $books = $home->getAllBooks();
    require(__DIR__ . "/../views/books.php");

}

function detailPage($what){
    $detail = new Books;
    $book = $detail->singleBook($what);
    require(__DIR__ . "/../views/single.php");

}


