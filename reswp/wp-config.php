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
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'sistemas' );

/** Database password */
define( 'DB_PASSWORD', 'sistemas' );

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
define( 'AUTH_KEY',         'cE>NBHbnkIegpu{zrAQ6Y f0H`ce4gb/w7d{h~bPup3f &tNu-UlROjxxtJ7@CJX' );
define( 'SECURE_AUTH_KEY',  '<+N)n(9}aH_@pMU&h?842Kq>+,>U-~;xJaMOdXZj7S|+IdFfH<UMYN0bqZ4./iP%' );
define( 'LOGGED_IN_KEY',    '5/Q/zY@q[,CRbOSnK<p:4]rN2]<ljo1=PP4<Fx &2uMK~05BtT~[3-Kw]BV`u2tx' );
define( 'NONCE_KEY',        '$8gKQQ,js&5j-kMZe+b.liq`I=xkP&jS+o!M87r%+SBabaA3SwL,vKvOnmM]d(~A' );
define( 'AUTH_SALT',        'cF#.lT~xpk&+]S+.CPH{h):m~?o^lWZH)#_#r9p*t|gPBQQ5m0Lf~}IvBF0I#Kzz' );
define( 'SECURE_AUTH_SALT', '^S 4oaX5WgGe7XZ~28qcScy:=eI5s0 (0h)+AbQ5bmN5LO}Hb;=`~TljR#es(d3@' );
define( 'LOGGED_IN_SALT',   'Bo~g<eUR4kSqT)(9]c&Qvi^Txl`LV]:;[E-s)khf~bcZUMhoYUi)P8e~q3=MI?KF' );
define( 'NONCE_SALT',       'JMa-O 5 mL[QgKPGuU-x(&*on_$_M p]NO0*P<Npe`xV8x{Q<#wn%..>&>P-hXV|' );

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
