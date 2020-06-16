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
define( 'DB_NAME', 'indata' );

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
define( 'AUTH_KEY',         'l5tBLNIS{Sx0iyJ&tL21!R.%kj>6WfW;C**%uCR{`Ph`G<5)1[fhOkg$as-K-`%3' );
define( 'SECURE_AUTH_KEY',  'r_s#F--YW3_]3Dgpy>Ef^/:_e1XlL)4,EB$E_VK) 8s>`UOJz>E^egYW4pivyRA]' );
define( 'LOGGED_IN_KEY',    'KMxI]jw+CjFMdl&`MI8+Inn!n-_70l~e^0ZvM+0_zT;)jFhaR3rgzZ_2=S!Zx6+5' );
define( 'NONCE_KEY',        'Fl`c.GrPt4:`dxNy0gh8m|,IE]c>v6c|N ;|c6]R)bz@P&JD}<=|`iJRVJbIk#~@' );
define( 'AUTH_SALT',        '@*^r45W7=#$T!Rf9q<`$PT)!fQNnd|f257<ao!T|&e-@D?;$CcH)tB{d24I@FZAx' );
define( 'SECURE_AUTH_SALT', '=V)NHV^>hj#7&iK,bmnq:W|LZ:@-i< %.^SLnkLPSm6![.>2G*W<B&BY-b-nas7v' );
define( 'LOGGED_IN_SALT',   'PQbGgDJkR[_2?x#nDp5s Kg7lEgV&g8qsqAeI,fo~b=$^i+#F#yRAuK8<3)mUX8W' );
define( 'NONCE_SALT',       'eKimKv@wFq ^A2>]4[bhJG.l=#[}chTLqz6wRMbjxR ~|gu~Et:5xYfXF!^]X</N' );

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
