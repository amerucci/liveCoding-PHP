<?php
ob_start();

?>


<div class="col" style="background:#FF9900">Choeurs</div>
        <div class="col">Cuivre</div>
        <div class="col">Triangle</div>


<?php
$title = "Choeurs";
$lavariablequicontientmoncontenu =  ob_get_clean();
require_once('template.php');
?>