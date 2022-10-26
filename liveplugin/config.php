<?php
/*
Plugin Name: LiveCoding Plugin
Description: Live coding présentant la création d'un plugin
Version: 0.1
License: GPL
Author: Alain MERUCCI
Author URI: https://www.alainmerucci.fr
*/

/*
 * Ajouter d'un nouveau menu à notre panel Admin
 */
// On attache l'action monLienAdmin à admin_menu
add_action('admin_menu', 'myPluginLink');

// Add a new top level menu link to the ACP
function myPluginLink()
{
    add_menu_page(
        'Titre de mon plugin', // Titre de ma page
        'My plugin', // titre du menu qui va s'afficher
        'manage_options', // On a besoin de cette fonction afin de pouvoir arriver sur la bonne page quand on clique
        plugin_dir_path(__FILE__) . 'includes/plugin_page.php' // L'adresse de là ou l'on doit arriver quand on clique sur le lien
    );
}




