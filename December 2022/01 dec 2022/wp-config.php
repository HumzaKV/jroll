<?php
define( 'WP_CACHE', false ); // By SiteGround Optimizer
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */
 
define('WP_TEMP_DIR', ABSPATH . 'wp-content/');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'db8x0p7gfhuucg' );

/** MySQL database username */
define( 'DB_USER', 'uuhraxo2iizqj' );

/** MySQL database password */
define( 'DB_PASSWORD', 't8uybokthxum' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

// enable cron 
define('DISABLE_WP_CRON', false);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '68<:#ek<b)i4#!s>w@EYV)z*qx+Q7.eGL-tpD%>;Lab`+%~t{H)F&iWHy3Xk.D@n');
define('SECURE_AUTH_KEY',  '`-J2o3sE:$vzxT4/K8=Yqxkv1**N=*S5AZX6,xrXT_oa@k:0%G#trw?3Nz.Rnq~?');
define('LOGGED_IN_KEY',    '`2p!(<5*FRYex!)rj{SM<?E#vM9d[YU[^%&-%1z44-8TwawTFJJxN]JPah{jXn;*');
define('NONCE_KEY',        '{|~j<I>Gn1JQU9(..UCpHaGE9(A0iYSKwwV&Ug#bd*Mj|[Y0]Bn.D%6M6?<=JXKa');
define('AUTH_SALT',        'w_[kw)!>L/fIu&Fm6@l%P _en<(6498(AlZ_?ps0ns*z(c=Ns)^J.BH!59ffBM`h');
define('SECURE_AUTH_SALT', '>UCU$?dQbE:np%_Lg,cZHg6wwtvsC&(.]2iW(5$k5rHVEc0pR%c5%ny#z,YBYtZX');
define('LOGGED_IN_SALT',   'os!e!z>Gv_cyo*OOOE5g7w$w1JsJY!?d^HjQp_HhrP9sGvsK, LL8$x7bI:5s^IT');
define('NONCE_SALT',       '~yC)Ay/l<SrgW76#2AId5~;ekB4>(L#%1@&!A!(Pu/khW_dkBK)`YAFh[!n{t#`e');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);
define('WP_DEBUG_LOG', false);
define('WP_DEBUG_DISPLAY', false);
// @ini_set('display_errors', 0);
// define('WP_TEMP_DIR',dirname(__FILE__). '/wp-content/temp/');

/* That's all, stop editing! Happy blogging. */


/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Sets up WordPress vars and included files. */
define( 'WP_ENVIRONMENT_TYPE', 'staging' ); // Added by SiteGround WordPress Staging system
@include_once('/var/lib/sec/wp-settings-pre.php'); // Added by SiteGround WordPress management system
require_once(ABSPATH . 'wp-settings.php');

@include_once('/var/lib/sec/wp-settings.php'); // Added by SiteGround WordPress management system
