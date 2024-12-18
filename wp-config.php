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
define( 'DB_NAME', 'testwork37555' );

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
define( 'AUTH_KEY',         '|1yhPZ-o:>?b$#T/V-!;Zvj] BB%npomsG%K7,c`P=cm9-%{o2>%/rnqiACh[=-A' );
define( 'SECURE_AUTH_KEY',  '<FY(VlKLx^r$LEi%$L!E#qIG6AlgpXBL@z(Jt PH7p,Dntl$e{LJ&VX9+0VjxmW8' );
define( 'LOGGED_IN_KEY',    'M+3[Z<$|7|)B<R<Sh]f7NDHT235OI(r5l_-i4zy*H[F1rwlO*v)6x*=6)jG-qJEv' );
define( 'NONCE_KEY',        'wkK[=+wt(hgh(u8}1n*=.LEoSh|sQPi?CgA38!vfp$iNyZgH{=L?W9H8&FrrvcUv' );
define( 'AUTH_SALT',        'LdEJiBB_}-kPIa@|{S2~KRjeYCD9sB#{4pU>L<rHT.=-j#1xI/.o-HSFe&9E75${' );
define( 'SECURE_AUTH_SALT', '!nO1w+4zZ>+a0JE8y0$7T?^{K..r+_3:F]Nm0b-x:b$0+rLGnz2X5;wPYnw<_GUl' );
define( 'LOGGED_IN_SALT',   'uphzRxMw;2ee%i;[{0lblt:&*/)7:.1L]*}S`t<yC<{TqNLBGO(3)J;Dm +,?pUD' );
define( 'NONCE_SALT',       '^FYk$Z^oA:no?E2K`oddHDaE4~W&5kfiwFh4]EBrw&j#F2]e`Yk/-@DaP?EDb-oM' );

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
$table_prefix = 'al_';

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
