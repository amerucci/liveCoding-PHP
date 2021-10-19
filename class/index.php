<?php
require_once('class/Humain.php');
require_once('class/Homme.php');

$francis = new Humain("Francis", "Pernot", "01/01/01", "Homme");
$yamina = new Humain("Yamina", "Jouille", "01/01/01", "Femme");
$lucas = new Humain("Lucas", "Trop long", "01/01/01", "Homme");
$al = new Homme("Al", "the boss", "01/01/01");

$yamina->setCouleurDesYeux("Arc en Ciel");
$lucas->setCouleurDesYeux("Jaune");



echo $al->setCouleurDesYeux("brun");









?>