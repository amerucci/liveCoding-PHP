<?php


ob_start();

?>


<div class="col">Choeurs</div>
        <div class="col" style="background:#FF9900">Cuivre</div>
        <div class="col">Triangle</div>


<?php
$title = "Cuivres";
$lavariablequicontientmoncontenu =  ob_get_clean();
require_once('template.php');

?>