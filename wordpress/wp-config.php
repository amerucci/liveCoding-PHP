<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wordpress' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'U+JlX,bm4DEiKw00{l%?$]`WV/g9X=Wb4G/XKfQ_8}}a4;+itqu>x*/)Gtr%4<uE' );
define( 'SECURE_AUTH_KEY',  '74htiWI<dL+IdU_5gaK*3H9T(*9jXh*R% OW]:}4WXecU/x0IO(x[(TL-Z9YDV,Y' );
define( 'LOGGED_IN_KEY',    'IK#eGlc? r|;&)z4/3`7&*7r-$TJ_t?vIy^~9>h95?E2Mxq ~AL#yjn3pUjY;s:K' );
define( 'NONCE_KEY',        '%+A7$RKJ,5mo@sWsKA8x}m[nYRGd3i(V:lRl;Med[7QHe,CXgik!JXH=uT1XuJb)' );
define( 'AUTH_SALT',        '`yidt!JEkFX%iUzyh{CZHLDy%BZ7_.K$/%N-G`-:$)#OCx RYbLyYtky.9f{hWFN' );
define( 'SECURE_AUTH_SALT', 'b_>o#2J{ ;xMkLo%yRO5t;`;/$+N?eG78reI@*xWqk)hZ{5J4@x:A~=+Z[r()-~%' );
define( 'LOGGED_IN_SALT',   'GHo]5AyWGY{.<R=x6G9T?jlP1u9v^k!sQ2yKk&FFw{*+},8VGPe8y/pFNuA(5UtI' );
define( 'NONCE_SALT',       'c3nkNFPXi0i*sZ5^`Q&w-@7F)U.XRLyqb1?e|I%vOxC(|e|Xce/H&rP``pd20 UI' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'acsw_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
