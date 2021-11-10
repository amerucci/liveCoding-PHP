<?php
$args = array('post_type' => 'salades', 'posts_per_page' => 8);


$loop = new WP_Query($args);

while ($loop->have_posts()) : $loop->the_post();
    echo "<li>";
    echo '<a href="' . get_permalink() . '">';

    echo the_title();
    $image = get_field('image_de_la_salade');
    echo "<img src='" . $image . "' />";
    echo '</a>';
    echo "</li>";

endwhile;




?>
