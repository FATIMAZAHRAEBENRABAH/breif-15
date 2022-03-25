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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'voyageAgence' );

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
define( 'AUTH_KEY',         ';~ 3vY[Li&XpNa+2W<hj/H*9.Rgz:&-i}XA0ol02JyAYLJvWbfjYi61k3,AtMu~p' );
define( 'SECURE_AUTH_KEY',  '2x=h7facFfDnb$9u?L$tY ud}S57bRz+c~:a7VUcSSiaz=z4%w@mKvF7(?<9kE8v' );
define( 'LOGGED_IN_KEY',    'nTe7fBC&C;zJ%;SfyyBDzNTh^tg?L@7/K%_?;x&e~UE*zLzd6x(=0{I y$rJy{dd' );
define( 'NONCE_KEY',        'gdaaax1<Trldk|-XpDN$c(?a<!/1`JI1nmu#L#+.x+cFTmYEe3FfZK8?441P,^ub' );
define( 'AUTH_SALT',        'wSy.5fvm=zp3G]H~[Bq2.Z$TwoPeBKInv* ErH6T>(U|uVU;anf,zqw} 0g#upQm' );
define( 'SECURE_AUTH_SALT', '![`W.UmTnrH/e?aVHw=BXy8U;B`t1e)elL:~U <3/{0IB[Y=*yB6)x6Ve!=0h@_>' );
define( 'LOGGED_IN_SALT',   'Eo5Tu[@w3P+[_v[#qxXgt23+8aU)C!?G4DJ3xHn$wSZj>_T<f0B.@Kp`KF)$S.A|' );
define( 'NONCE_SALT',       '$Zr,A:3jLews^q~,/9 a1gDGSozNe!,A6q`+x9Iqcyx6fXJ?TYJndrg*G3$v{+oz' );

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
