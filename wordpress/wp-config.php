<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'touchpoint_wp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '}X`ncp|)^|M5ifb-Y3#gq4,*3YYw<LBKE&H/`01tiIe}xZWpApSQR3jT)SN7ht+`');
define('SECURE_AUTH_KEY',  'lPI>GVi@|gY-d~6r&8^>>|on!JEb`D:M~]X:SB|-+8R)Hl5rh<%5V8dU`Za0,8($');
define('LOGGED_IN_KEY',    'hc#px|nvaj7HchL}LoWjGTo0,3V+LzlNewLgrJI>`JTX+=v eA%|G3@oW mUS*9l');
define('NONCE_KEY',        '/Xq]<,5|1R,CSIM!Z%Uz!o![keszY1-&3(PcK>}_Y5wRVV5NMp<BPv.>~Dv-^IO-');
define('AUTH_SALT',        '=$YGw~U2o!G@BYqGsT+Iu-j:t/%G}tO~t8c:g(Jv,*G)-k]-R>GC(G|.lY9>!^br');
define('SECURE_AUTH_SALT', 'Bl0N^Dbg+Q8CO99X.}k!3/p;Uak nYS^i-h(pi9og9AYZ/&B S+9e3MD(Y=70Sx/');
define('LOGGED_IN_SALT',   'G_bDYQ-JE<pgPgR4]VSN v`(AGnN*-3nd[79[zOnt%#k8<+:EI[dLHwDmRP5.C)%');
define('NONCE_SALT',       '3+RQ|Ob7(6y~h8%IBVu|+8g``Ts#x6${#h+0th;.[+d^*QX_`*_T_d&Iz^DPH!Ba');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
