<?php ob_start();?>
<div class="sticky">

<!-- Formulaire de recherche -->

<form class="form-inline">
    <div class="form-row align-items-center">
        <div class="col-12 my-1 theform">
           
            <input type="text" name='search' class="form-control mb-3" placeholder="Rechercher">

          



            <select class="custom-select mr-sm-2 mb-3" id="inlineFormCustomSelect" name="<?= strtolower(str_replace("é", "e", $whatSearch )); ?>">
                <option selected value="">
                <?php 
                
if($whatSearch == "Région"){
    echo "Toutes les régions ";
}
else {
    echo "Tous les départements";
}

                ?>
            </option>
                <?php
                $departementList = new Data();
                $dept = $departementList->getList(strtolower(str_replace("é", "e", $whatSearch )));
                //var_dump($dept);
                for ($i = 0; $i < count($dept); $i++) {
                    echo '
    <option value="' . $dept[$i]['code'] . '">' . $dept[$i]['nom'] . '</option>';
                }

                ?>
         </select>
         

         <a class="btn mb-3 more" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
Plus d'options
</a>

<button type="submit" class="btn btn-primary mb-3">Rechercher</button>

<div class="collapse" id="collapseExample">
<div class="moreoption">
<input type="number" name="hospitalisation" class="form-control" placeholder="Pers. hospitalisées">
         <input type="number" name="reanimation" class="form-control" placeholder="Pers. en réanimation">
         <input type="number" name="newhospitalisation" class="form-control" placeholder="Nouv. hospitalisations">
         <input type="number" name="newreanimation" class="form-control" placeholder="Nouv. réanimations">
         <input type="number" name="mort" class="form-control" placeholder="Pers. décédés">
         <input type="number" name="gueris" class="form-control" placeholder="Pers. guéries">
         </div>
</div>

         
        </div>
     
        
           
        
    </div>
</form>
            </div>

            <?php 
$html =  ob_get_clean();
?>