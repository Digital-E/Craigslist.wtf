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
define('DB_NAME', 'craigslist.wtf');

/** MySQL database username */
define('DB_USER', 'samabassett');

/** MySQL database password */
define('DB_PASSWORD', 'samabassett');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('FS_METHOD', 'direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'q-_fPH=o~VM9x2#I%)8DEJK3FqbdeqdVp3ZQ#r@.yxpEEG!&i1@CNzP;tm!KFj,K');
define('SECURE_AUTH_KEY',  'ni*)b9`d%fkT3S~C`Aworcj9yT%ynyG]?mPF3 WHbp*eKmfRz4s=@koP2}>P|3]V');
define('LOGGED_IN_KEY',    'GX[W`PJj4]e]~0=RY3S=696(;s,zg.&IiQh*y>/@XERb*WL?_K87f8m+fRg*_jtJ');
define('NONCE_KEY',        '6F*4seoiC;hdsXrz%MX}z5y5=54>tU|R[D.kF^&d(!FxO34likI}_g=[Vl`f=*%t');
define('AUTH_SALT',        '$mqXJ0` {~rehDUs)!UwMqOm1bYs T>oI6rAt$:<# wxxB;uR|EZJ*h l#Ji*xbV');
define('SECURE_AUTH_SALT', 'F9ci2^^K0N%d C68XyL2@,4qHHj^NUn}cxv*gS&NK:]{JqZX#F$,r)mU-G&#1xPU');
define('LOGGED_IN_SALT',   '$qrRpF}D]@Y3{ OZ*jKHOC0*w/^g/RYl89Nw4?;UGv=?if!0gM=a$3MR1hKdrFvf');
define('NONCE_SALT',       '=(}<;WiNR5GwZI2Dz`sQT,0eu],~&*%1%*-PMLT:4?8X~7=(H,!vrn8%WrDi[Eo ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
