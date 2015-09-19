<?php
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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'koga');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'mD,=E8v]1>+eVvK_,3Z_nmC_(VY!42T+!E3@.8yujA8Z*%M5EL^6P `X/@dP@b7g');
define('SECURE_AUTH_KEY',  'T_.q *Oc(.rBsWo>uM%:WRW_4}Cu 7ifhlx.U#HBEXmrYkW6Q6j$)O%0k31a9hFJ');
define('LOGGED_IN_KEY',    'ddiCU/J/}TSCb>VRDRPV.LI]b5;r@AD*G%!js*sHK&e-$|b Hm.v$ U~(L(T?U~+');
define('NONCE_KEY',        'c[tudNrDtTW.GsCO=^sw[{l)!{qB!Pt rvqcD-ta FJ1k5EP-ET+G,|>V|Jg(0jz');
define('AUTH_SALT',        '8FOHb9-,`3U3B|JCaoKu9@j9Br+yvFo-_d.El}Br[WRX[{$F@q54Q/D16M:8+GFz');
define('SECURE_AUTH_SALT', 'e+YD+@./&ORcxXTCeC9{wi7k =fO)1B{KyBC#9 @4CM5k9/0S3gG/B|+2YdKdZ=,');
define('LOGGED_IN_SALT',   'c!cHD`)Da}Wa{hI7nyM,+tS9q-6XGJ,b&0o:-;e~GA}y9! .:KlP[8P[5F4=+4T1');
define('NONCE_SALT',       'kKwD|cni9kqYH$T l,M;mdVn1(Br><yTtznWdr0)yW]3aBYD9fJBUm&hI3/==m1A');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
