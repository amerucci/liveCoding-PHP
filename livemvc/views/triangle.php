<?php
ob_start();
?>


<div class="col" >Choeurs</div>
        <div class="col">Cuivre</div>
        <div class="col" style="background:#FF9900">Triangle</div>

        

<?php
$title = "Triangle";
$lavariablequicontientmoncontenu =  ob_get_clean();
 require_once('template.php');

?>