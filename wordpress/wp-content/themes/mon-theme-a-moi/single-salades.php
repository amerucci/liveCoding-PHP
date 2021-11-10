<?php

include("header.php");

?>

<div class="container">
    <h1><?php the_title();?></h1>
    <div class="contenu">
        <?php the_content(); ?>
    </div>
    <div class="extra">
        <li>
            <?php echo get_field('prix'); ?>
        </li>
        <li>
            <?php echo get_field('varietes'); ?>
        </li>
    </div>
</div>

<?php


include("footer.php");