<?php
/*
Plugin Name: Simple Météo
Description: Plugin Météo simple en PHP pour Wordpress
Version: 0.1
Author: LiveCoding
*/



/*
 * Ajouter d'un nouveau menu à notre panel Admin
 */


// On attache l'action monLienAdmin à admin_menu
add_action('admin_menu', 'lienDeMenuDansLaBarreLaterale');

// Add a new top level menu link to the ACP
function lienDeMenuDansLaBarreLaterale()
{
    add_menu_page(
        'Admin Page Simple Meteo', // Titre de ma page
        'Simple Meteo', // titre du menu qui va s'afficher
        'manage_options', // On a besoin de cette fonction afin de pouvoir arriver sur la bonne page quand on clique
        plugin_dir_path(__FILE__) . 'includes/pageAdministrationPlugin.php' // L'adresse de là ou l'on doit arriver quand on clique sur le lien
    );
}


// //Ici nous avons une fonction qui va ajouter une page si le plugin est activé
function initialisationPlugin()
{



    //Création de la table dans la BDD
    global $wpdb;
    $servername = $wpdb->dbhost;
    $username = $wpdb->dbuser;
    $password = $wpdb->dbpassword;
    $dbname = $wpdb->dbname;
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    //Création de la table communes en bdd
    $sqlcommune = $conn->prepare("DESCRIBE " . $wpdb->base_prefix . "lescommunes");
    if (!$sqlcommune->execute()) {
        $sqlcommunes = "CREATE TABLE " . $wpdb->base_prefix . "lescommunes (
                   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                   code INT(6) NOT NULL,
                   nom VARCHAR(30) NOT NULL
                )";
        $conn->exec($sqlcommunes);
    }





    //On crée une page pré-remplie
    //Le tableau de données   
    $weather_arr = array(
        'post_title'   => 'Page pré-remplie',
        'post_content' => 'Salut les loulous notre est bien créée.',
        'post_status'  => 'publish',
        'post_type'    => 'page',
        'post_author'  => get_current_user_id(),
    );

    //Ici la fonction d'insertion prenant en paramètre un tableau de données
    wp_insert_post($weather_arr);
}
register_activation_hook(__FILE__, 'initialisationPlugin');

// //Ici nous avons une fonction qui va supprimer une page si le plugin est désactivé
function myplugin_deactivate()
{
    //ici on récup_re l'id de la page que l'on a créé
    $pageASupprimer = get_page_by_title('Page pré-remplie');
    wp_delete_post($pageASupprimer->ID, true);
}


register_deactivation_hook(__FILE__, 'myplugin_deactivate');

// ShortCode Méto simple

function aquijedisbonjour($aqui)
{
    return "je dis bonjour à " . $aqui;
}

function shortcode_direBonjour($qui)
{
    $aquionditbonjour = isset($qui['prenom']) ? $qui['prenom'] : '';
    return aquijedisbonjour($aquionditbonjour);
}

add_shortcode('salut', 'shortcode_direBonjour');

function calcul($nombre)
{
    return $nombre . ' * 5 qui est égal à ' . $nombre * 5;
}

function shortcode_faitlamutiplicationparcinq($lenombre)
{
    $lenombreapasseramafonction = isset($lenombre['nombre']) ? $lenombre['nombre'] : '';
    return 'vous voulez connaitre le produit de <span style="color:red">' . calcul($lenombreapasseramafonction) . '</span>';
}

add_shortcode('calculmoica', 'shortcode_faitlamutiplicationparcinq');



function meteo($ville)
{
    global $wpdb;
    $dequelleville = isset($ville['ville']) ? $ville['ville'] : '';
    $servername = $wpdb->dbhost;
    $username = $wpdb->dbuser;
    $password = $wpdb->dbpassword;
    $dbname = $wpdb->dbname;
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $getapik = $conn->prepare(
        'SELECT * FROM ' . $wpdb->prefix . 'options WHERE option_name="apikey"'
    );
    $getapik->execute();
    $valeurCleApi = $getapik->fetch();
    $curl = curl_init("https://api.openweathermap.org/data/2.5/weather?q=" . $dequelleville . "&appid=" . $valeurCleApi['option_value'] . "&lang=fr&units=metric");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $meteo = curl_exec($curl);
    $meteo = json_decode($meteo, true);
    //return $meteo;
    //var_dump($meteo);
    echo $meteo['weather'][0]['description'];
}

add_shortcode('meteo', 'meteo');


// [salut prenom=vincent]
// [salut prenom=jorge]
// [salut prenom=pauline]
// [salut prenom=vincent]
// [salut prenom=vincent]
// [salut prenom=vincent]
// [salut prenom=vincent]
