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
define('DB_NAME', 'wp_bepankhang');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'mysqlHaoilaHa');

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
define('AUTH_KEY',         'imEK82a>Hcp9-1 qR3!q}}g8i5=Y-x! D0c(.8ml-Gg,N/.]Syry6Re^jwQ<Z}/=');
define('SECURE_AUTH_KEY',  'iG|PNE>4mm4tMz_!9[cLT`XepAHn]E^Um&Gk#dn-O2a>n8pjMQzC%~_9ZHT>OjoV');
define('LOGGED_IN_KEY',    '_mTBM)u._fU~-U88hHHbZcyw6Vi3p]R^Ta_Y6bQpH)L:V`&IRDDv09Ctn*o3gCYI');
define('NONCE_KEY',        '0CWJ+YI@OPrXinq#-R8FwD@%i5B=)J)9#nx27K*4>>j0l>dU[~Q&xF;6 D|FjR@h');
define('AUTH_SALT',        '+/IA@cWJMfr;$q1{z&!#L~]/k=~Pb;J }]ni@V|:B)mf_1]tEdkELY{)NcIp!BA)');
define('SECURE_AUTH_SALT', 'v|-WUVP,A<#+8sT]hwAa.: .[Lh $R$hA)bDY~Z NUIc!4%r5Ab3]Cku8*~ag Ln');
define('LOGGED_IN_SALT',   'je%p$xb>P~>8%~svau%TO/GpISbT&(X@&<AdMudThO5NEsYc3/_(!H-UU2<(m)qg');
define('NONCE_SALT',       ')a4OEi;n)!AD.jRlZ6X.-3_%tY_xR|dfCu$Lp@_^_XGmhrumPB`tI;UQQ5N@L+Ve');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'bak_';

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
