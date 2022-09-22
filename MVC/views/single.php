<?php


ob_start();

?>



<div class="album py-5 bg-light">
    <div class="container">
       
            <div class="col">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                    </svg>

                    <div class="card-body">
                        <p><?php echo $book['auteur']; ?></p>
                        <h1 class="card-text"><?php echo $book['titre']; ?></h1>
                        <p class="card-text"><strong>ISBN : </strong><?php echo $book['isbn_10']; ?></p>
                        <p class="card-text"><strong>Prix : </strong><?php echo $book['prix']; ?> €</p>
                        <div class="d-flex justify-content-between align-items-center">
                        Y a des gens qui ont pris la peine de faire un dessert. La moindre des choses c’est de rester pour le manger. On construit un barrage, après on lance de la caillasse de l'autre côté de la rivière pour faire croire aux autres qu'on a traversé dans l'autre sens, une fois qu'ils sont au milieu, on casse le barrage et on les noie. Vous en avez encore beaucoup du sensationnel comme ça? C’est une tarte aux myrtilles. Pourquoi elle vous revient pas?

Merde! S'ils ont entendu mon plan c'est foutu. Et alors c'est pas permis? Faut faire un feu en forme de cercle autour d'eux, comme ça ils se suicident, pendant que nous on fait le tour, et on lance de la caillasse de l'autre côté pour brouiller. Non? Droit devant, en plein dans leurs tronches. Ah mais non, on va se faire tuer là! Allez en garde ma mignonne! On va pas rester plantés là comme des radis.

Mais… C’est le Chevalier de Provence ou le Chevalier Gaulois? Faudrait savoir! Ouais le problème c'est qu'on a passé quatre semaines à construire un barrage, ça fait un peu mal au cul de le détruire. Vous avez dit que ça devait être vexant! Ben voilà! Vous êtes vexé! Moi, prochaine bataille rangée je reste à Kaamelott.

Un chef de guerre qui commande plus c’est pas bon. Il va déprimer, il va s’mettre à bouffer, il va prendre quarante livres! Y a des gens qui ont pris la peine de faire un dessert. La moindre des choses c’est de rester pour le manger. Mais ça va! Pourquoi vous m’agressez? Animaux de la forêt! Auw auw ouh, woh woh woh woh, auw aouh! Ils sont encore là, ces cons!

Ah il faut la tenter celle-là! Y a des gens qui ont pris la peine de faire un dessert. La moindre des choses c’est de rester pour le manger. P’tite pucelle!
                        </div>
                    </div>
                </div>
            </div>



      



    </div>
</div>


<?php
$single =  ob_get_clean();
require_once('base.php');

?>