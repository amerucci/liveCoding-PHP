<?php
require_once './controllers/Chefdorchestre.php';

if(empty($_GET['page'])){
   require_once('views/template.php');
}else{
    switch($_GET['page']){
        case 'plusfort': mecfaitjouerplusfort();
        break;
        case 'moinsfort': mecfaitjouermoinsfort();
        break;
        case 'gojorge': jorgesorstoilabaguettedunez();
        break;
        default: echo "<h2>404 - Désolé cette page n'existe pas :(</h2>";
    }
}

?>

