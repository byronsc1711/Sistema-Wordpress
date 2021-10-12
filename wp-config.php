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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'practicas' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'L~+2]WNceQ-5tx0[bk?a}HDt_5<4(WcCus#syuy$=C23GP4nBwXDML8Sc6`@y_m;' );
define( 'SECURE_AUTH_KEY',  '!(&,4qvc1UB>M S0 1`S[N7SwIs)[KARG2eU&HSUZ5?]|3ZoO-|6,Yg6~,oT+%gW' );
define( 'LOGGED_IN_KEY',    '$PQD/>D]*j+TFo g7Xe{>ic<2OA)T#xWFtI37l,VjGf,|Y@o>JNatfV/LWEU#UrN' );
define( 'NONCE_KEY',        '|0tQSNcrq7cG.LvYaw|sCo`{-aaJdvqt9G4Dj@rl.Zows? l8c)P,I4i~[aV=OC5' );
define( 'AUTH_SALT',        'R^j1)O #(wX@[ePH@ xA{VwX6NRbeLh?!EEaF=%hJ#&D<.[k+~Ik$K,x_mOpK5lF' );
define( 'SECURE_AUTH_SALT', 'h(i`Vk+8NM}9nl$EzlAh}xqR%r?d%~l}#0>NL?VW>Vn3MT(l3ZkS-*QwR(!=@:U8' );
define( 'LOGGED_IN_SALT',   'N-sdmD9dp-=`<Zg9b+/z%k`!_ukSb|E8B4L@-1Lrp)Oxbr!TbvW#.XSg+Fah!PI;' );
define( 'NONCE_SALT',       '2o}]`KQn_y`](Xy@es5O+~J6c=wy&)wR)[;$kIbN5=)Q1gWjV|4}&[D7#$|nf?Bs' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wordp';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
