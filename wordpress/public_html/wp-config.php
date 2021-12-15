<?php

/**
 * Custom WordPress configurations on "wp-config.php" file.
 *
 * This file has the following configurations: MySQL settings, Table Prefix, Secret Keys, WordPress Language, ABSPATH and more.
 * For more information visit {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php} Codex page.
 * Created using {@link http://generatewp.com/wp-config/ wp-config.php File Generator} on GenerateWP.com.
 *
 * @package WordPress
 * @generator GenerateWP.com
 */

/* MySQL settings */
define('DB_NAME', getenv('WORDPRESS_DB_NAME'));
define('DB_USER', getenv('WORDPRESS_DB_USER'));
define('DB_PASSWORD', getenv('WORDPRESS_DB_PASSWORD'));
define('DB_HOST', getenv('WORDPRESS_DB_HOST'));
define('DB_CHARSET',  'utf8mb4');

/* MySQL database table prefix. */
$table_prefix = getenv('WORDPRESS_DB_PREFIX');

/* Authentication Unique Keys and Salts. */
/* https://api.wordpress.org/secret-key/1.1/salt/ */
define('AUTH_KEY',         's4Eo`+d+p6@+[<sdS6}Z%<38-4)0){WD2${`_#Arfu)J@K<f38b6+bhbf0!|%Mi%');
define('SECURE_AUTH_KEY',  '/[aYHrEX,j8s5:Q&6o<z]qC:6%dzt1N6Tb$x*1R.WF+()MDz2{:a(zSNtdD9qa;W');
define('LOGGED_IN_KEY',    'eBsltf--9wE?pm8wv,0(-YG|:^<5f*.=|xbDp<S`-7&bu3Ocw?+-z0nM&&g:ZMjP');
define('NONCE_KEY',        'Q$iFF<-D2@$NAAkf~}.kvVwGiCh7AwKzY]V,-X-#0w{;k,P;)X]9Ys0IL*)fk#1T');
define('AUTH_SALT',        '$iqLrg:IUmCkv*V3z(UtB 1(D@BSL/%:MMVS=UGtti]cGI! 8v$5EIUM/x |k4lf');
define('SECURE_AUTH_SALT', 'o%O{-6-s j)QTE!5?I?Dxv[7_{P%%=>z~fqd~R3j6wn|(z&IUb4`nw)<@zSjiAS[');
define('LOGGED_IN_SALT',   'VrS^ZE@R[5eQP./q&(/+v^2`-2mSHT[Y!M[M1|:Rez+pF)&5^<ZyoCTHs< @ZnE%');
define('NONCE_SALT',       'mM&KTqGAr _WOPhB|6s8OU-8RHzaQt5N4J}G(mXT1dPdiyyeSA1z-|do9!+K<FiM');



/* WordPress debug mode for developers. */
define('WP_DEBUG',         true);
define('WP_DEBUG_DISPLAY', true);
define('SAVEQUERIES',      true);


/* Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', dirname(__FILE__) . '/');
}

define('WP_CONTENT_FOLDERNAME', 'wp-content');
define('WP_CONTENT_DIR', dirname(__FILE__) . '/' . WP_CONTENT_FOLDERNAME);
define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST']);
define('WP_SITEURL', WP_HOME . '/wp');
define('WP_CONTENT_URL', WP_HOME . '/' . WP_CONTENT_FOLDERNAME);
define('DISALLOW_FILE_EDIT', true);

/* Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
