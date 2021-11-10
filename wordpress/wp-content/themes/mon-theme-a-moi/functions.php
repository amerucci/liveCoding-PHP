<?php

function mesMenusWordpress()
{
    register_nav_menus(
        array(
            'header-menu' => __('Zone menu header'), 
            'footer-menu' => __('Zone menu footer'), 
        )
        );
}

add_action('init', 'mesMenusWordpress');

/*
* On utilise une fonction pour créer notre custom post type 'Salades'
*/

function custom_post_type_salades() {

	// On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
	$labels = array(
		// Le nom au pluriel
		'name'                => _x( 'Toutes nos salades', 'Post Type General Name'),
		// Le nom au singulier
		'singular_name'       => _x( 'Salade', 'Post Type Singular Name'),
		// Le libellé affiché dans le menu
		'menu_name'           => __( 'Nos salades'),
		// Les différents libellés de l'administration
		'all_items'           => __( 'Toutes les salades'),
		'view_item'           => __( 'Voir la salade'),
		'add_new_item'        => __( 'Ajouter une nouvelle salade'),
		'add_new'             => __( 'Ajouter'),
		'edit_item'           => __( 'Editer une salade'),
		'update_item'         => __( 'Modifier une salade'),
		'search_items'        => __( 'Rechercher une salade'),
		'not_found'           => __( 'Auncune salade trouvée'),
		'not_found_in_trash'  => __( 'Auncune salade trouvée dans le panier à salade'),
	);
	
	// On peut définir ici d'autres options pour notre custom post type
	
	$args = array(
		'label'               => __( 'Salades'),
		'description'         => __( 'Tout sur les salades'),
		'labels'              => $labels,
		// On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields', ),
		/* 
		* Différentes options supplémentaires
		*/
		'show_in_rest' => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'salades'),

	);
	
	// On enregistre notre custom post type qu'on nomme ici "salades" et ses arguments
	register_post_type( 'salades', $args );

}

add_action( 'init', 'custom_post_type_salades', 0 );