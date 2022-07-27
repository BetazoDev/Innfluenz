<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'aquamarine' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'l}<9[r>0 [t3h}7=0w28^p;^hKUm8yIMO?F(ZKwg[~Ic:XE7o.Py%Q)RkJqa(NjX' );
define( 'SECURE_AUTH_KEY',  'Z=,p9C&{ska^X.|&;@/MB_jI:Hb7U03D)p}`>%},E%c#,_&EzG_tn</;^r=8K|wm' );
define( 'LOGGED_IN_KEY',    'Ug?)u;MpOt8XU5i9<Ik;Th0PO_<Cs_,LK;wTbmYU;Fv,gF!xa16PK6(!1^$Fka7)' );
define( 'NONCE_KEY',        'awSW_cp4Sc^|y$aAcEk5s[iQ!pC*3T$e^M^i,G*&F +iW/eub5t=D,u][vMPLrsm' );
define( 'AUTH_SALT',        '?(Z<[20ZBk`c8o*b?~^Tv|~EjX!m~iD}-GW7N}s#p[KG`uzyU(!C;yK3w/g.p~dS' );
define( 'SECURE_AUTH_SALT', 'hAW{:nT8=!D7%UHsY8RT.{z*XI_;cjfMr Juq-W=i>N|up_17yJGIE_{hOzb|ViS' );
define( 'LOGGED_IN_SALT',   '4e`.q.A@MULtP/a[;H] uZi(VlP2)F2pMaP)~G[L, ej_R,Xw;}#0vJgD3XuKBm%' );
define( 'NONCE_SALT',       ',Z/Q.PoMBP,bI0SF+uCJPqGFQ.E=e7-x2VNLcCwrA1&_m^$qKz7P6N1#o (,Fvt|' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
