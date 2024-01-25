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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'plugin_1' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
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
define( 'AUTH_KEY',         'd^<0|Re=V)O?!}+-F7+CkSux02TMY|x[Ex}02rhcy|+Z{44R9$3-o)$dKOx|3f)1' );
define( 'SECURE_AUTH_KEY',  'vaRShaBJ}=!W6=-12bCp.u)3$L2D{Bh %ix5+^sitIQ#N6[Dc=7z#ULH@m4/S.&E' );
define( 'LOGGED_IN_KEY',    'H0*|W;ylH?,Qi$qM^}~&s(9d=G@>d*`k8hD 8L`nqEmS*.*v`YIvhv2QCqoralNN' );
define( 'NONCE_KEY',        'c=US[Ly?M3k0i5Lk5e_5W~|yQkie*.V]^]mV7gCg::(44>p+Pri~MNjv}fhTir|+' );
define( 'AUTH_SALT',        '6LHm668QUk4=5Dt!C*jHb}#R&sKlfdt]{IMcprr$`4 @Z*};0x7^wgJs]waIMMk<' );
define( 'SECURE_AUTH_SALT', 'H/n0pK2=;l?KtR!(YW;=Y1C]|nr:qBjy&n=u])q#[box]XCuyu>F*<bUkTmI[VG~' );
define( 'LOGGED_IN_SALT',   '5,Qeep}hap]TO.%>BF;9JkgI3I6W4-4,o:V.9Z--WYU?x)>X;E@nLH4|jMG]0vs{' );
define( 'NONCE_SALT',       '9f$rUQD*-t0cFqZ?tdI3eO:Rt~j`-O{Z,Fl$nII;JonmM7%D^S^DXapnk%6M:Vx ' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
