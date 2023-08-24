<?php
define( 'WP_CACHE', true );

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
define( 'DB_NAME', 'ecplatform' );

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
define( 'AUTH_KEY',         '~>98CB8Lt@`3!u|F0hu(U?2c8<?S_S~P:/C:!~a.+i/X>-m^J$PkUqBlR-6uUL+&' );
define( 'SECURE_AUTH_KEY',  '%Y%2 r1CKe`%O|xFfs)@oT%xjVsIY)}V-daAK7}IS)>|!jMyqxEqI:B,^82`ugRF' );
define( 'LOGGED_IN_KEY',    '_1!2H2ZqPL(,Yfc{lLGBP_3ddqVz/RhihHU:{:6K5ARs!-n.D;Eek(Q+&,eV<ql.' );
define( 'NONCE_KEY',        'V>O;zeIpNHvYL}&MpYerKns#z^DTl@qyW%l*C9, ly^,`8WZ]6+>_/E;r_.bKfbG' );
define( 'AUTH_SALT',        'D+C|=kGL<~RWGc54rG8 R9mx|HXPDo>&q1]]E)1uWd^88[LQa id&F}$]m|`AEYK' );
define( 'SECURE_AUTH_SALT', 'p~b)7/T]{WpL{}Os=IUAV!_G:PC*S(S^mU5K|Z2#ydzM:2P52?iWgrF7OUw&nX>u' );
define( 'LOGGED_IN_SALT',   '@fYj>0E t@3Sk|}g~?A>;#Yq_+(Z0mB8u0=[.n9$a:16XBs|0>f8> hM!KDnE^?^' );
define( 'NONCE_SALT',       ':lz U)f%MkRy;rDr^|p1.,#E(;ztLR36#m!avtTKr(iDce7lE!~n]5@`zF;,:^k+' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'EC_';

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
