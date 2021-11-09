<?php
/* Template name: Gabarit Homepage */ 


include('header.php');
?>

<header>
<div class="container-fluid">
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://via.placeholder.com/150" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://via.placeholder.com/151" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://via.placeholder.com/152" class="d-block w-100" alt="...">
    </div>
  </div>
</div>
</div>
</header>



<div class="container">
    <h1><?php the_title(); ?></h1>
    <div class="content">
    <?php the_content(); ?>
    </div>
</div>



<?php
include('footer.php');

?>

