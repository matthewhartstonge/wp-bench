<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache


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
define( 'DB_NAME', 'secret_db' );

/** MySQL database username */
define( 'DB_USER', 'secret_user' );

/** MySQL database password */
define( 'DB_PASSWORD', 'secret_user_password' );

/** MySQL hostname */
define( 'DB_HOST', 'mariadb' );

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
define( 'AUTH_KEY',         'qbi4r*/R^(s#+6d!s7Hmw<*1]-%^JjlLc3L7-@:v&c!cX=_S3@~-<?6^=y-jw>LF' );
define( 'SECURE_AUTH_KEY',  'X2HJ:/$ Z>.eg;;l+!&1euFi~.{6bG~p>DGj[Ir,L%dt-B`XZ}[YdtQS)~WR@9fs' );
define( 'LOGGED_IN_KEY',    'Z`GLCQzAvV6uMpt@g!d_?J[9j:QpSy%elVUsTNCp}_9$[JFGT7on;enx#l?4kDt)' );
define( 'NONCE_KEY',        'tnx;5mf!H@oRJrq*U>,VI*vd G[c}7 jXO)Uo{[stYujgZo|%oK+mR8[oTFr0D-<' );
define( 'AUTH_SALT',        '*{y2=X$}Z sa9vl7d=DheK5MWX(X50]:SThLSlNWsL4|Kh~)_Aaq}-E)tpJ,Z[<f' );
define( 'SECURE_AUTH_SALT', '8.Z.FBPldGbsUTG|;r4-{N$R+h?kM1.y;a)&-2IH#aO|Adtc2LLmx?1/vift!P1F' );
define( 'LOGGED_IN_SALT',   'I{~qJ&IC(?);~I+AL,`~NG:^h%a%$mr]TSgp6?%`qWe`BDSSvWN[(7CJ1&Dbq_@z' );
define( 'NONCE_SALT',       '-qhKwo>D.u(!~4V5:YL{6apUW@V)1*+|A?ccQq?8/gxwE|m/[`B4{0KN$8pg@HAH' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
