<?php
/* Template name: Gabarit Homepage */


include('header.php');
?>

<header>
  <div class="container-fluid">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">


        <?php $lesphotos = get_field("les-photos");

        foreach ($lesphotos as $laphoto) {
          echo '  <div class="carousel-item active">';
          echo '<img src="' . $laphoto['photo'] . '" class="d-block w-100" alt="..."/> ';
          echo '</div>';
        }

        ?>
      </div>
    </div>
  </div>
</header>

<?php echo "<pre>";
var_dump(get_field("les-photos"));
echo "</pre>"; ?>



<div class="container">
  <h1><?php the_title(); ?></h1>
  <div class="content">
    <?php the_content(); ?>
  </div>
</div>



<?php
include('footer.php');

?>