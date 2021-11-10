<?php
/* Template name: Gabarit Salades */ 


include('header.php');
?>


<!-- Ici je veux faire une boucle pour afficher toutes les salades -->




<div class="container">
    <h1><?php the_title(); ?></h1>
    <div class="content">
    <?php the_content(); ?>
    </div>
</div>


<?php
    $args = array( 'post_type' => 'page', 'posts_per_page' => 8 );


	$loop = new WP_Query( $args );
	
		while ( $loop->have_posts() ) : $loop->the_post();
	echo "<li>";
        echo '<a href="'.get_permalink().'">';	

                echo the_title();
                $image = get_field('image_de_la_salade'); 
                echo "<img src='".$image."' />";
			echo '</a>';
            echo "</li>";
		
    	endwhile;

	


	?>


<?php
include('footer.php');

?>

