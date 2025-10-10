<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'xs888688_wp4' );

/** Database username */
define( 'DB_USER', 'xs888688_wp4' );

/** Database password */
define( 'DB_PASSWORD', 'wbe0hu7rrx' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',         '6l+(Z_TY<;LUngB~bVZRbf#.`hd|+QWu<ymlq[#pz):g-Tz80|F-SP#)fM2,ADw5' );
define( 'SECURE_AUTH_KEY',  '6:aUP5~pdrb8yIMclfn2eAUX37.{j26%_/Gv/7ZYTrk/^[mWH F4E~w%r+8xh~zM' );
define( 'LOGGED_IN_KEY',    'UXRK~Vx.^^<nXjlSKbM(1@q#fO|zA.MaEi4X)2&2+Gu;+DPF-kjPC+&v0YdU[Oz/' );
define( 'NONCE_KEY',        ')fg%mM >#AT5Nk0Z`jJ.3T#Wb7d;)[(i:Q+XCM-69[Sa4-+3Jy?Q=s|2 _b<cmhD' );
define( 'AUTH_SALT',        'WVT5R1w@iR[)|KzMxpJ6@e[#e:Q6c)vWbua joc7ix|Rv;e&0w.Sj7wUkmAm,5sT' );
define( 'SECURE_AUTH_SALT', '_`oD4XF7!yUvh#Wf7oxRrpD`M$DFM6POTP$VLf/LA]0gLf?k,Lwl9 >@oKxH#/He' );
define( 'LOGGED_IN_SALT',   ')]>N)T.=!jN|(%L(;2AqjBCs6;,45orf/T$KNz+W6C[[:K|[!sDU 1Yq$8Ki_)/S' );
define( 'NONCE_SALT',       'Q!$HV/2JYL`*8 |ICOUzF:;`&~,N#|Ce9uMyfTGoP:aeAL,L0P1=.5j*KrC%t_dy' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
