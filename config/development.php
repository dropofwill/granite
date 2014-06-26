<?php

/* Development specific config file*/

define('DB_NAME', getenv('DB_NAME'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASSWORD', getenv('DB_PASSWORD'));
define('DB_HOST', getenv('DB_HOST') ? getenv('DB_HOST') : 'localhost');

define('WP_HOME', getenv('WP_HOME'));
define('WP_SITEURL', getenv('WP_SITEURL'));

define('SAVEQUERIES', true);
define('SCRIPT_DEBUG', true);

define('WP_DEBUG', true);
// Tells WordPress to log everything to the /<WP_CONTENT_DIR>/debug.log file
define('WP_DEBUG_LOG', true);
// Doesn't force the PHP 'display_errors' variable to be on
define('WP_DEBUG_DISPLAY', false);
// Hides errors from being displayed on-screen
@ini_set('display_errors', 0);
// Minimizes some of the repeated errors
@ini_set('ignore_repeated_errors', 1);

/**
 * Set this if the owner of the WordPress/plugin files
 * are not the web user, but the web user has write access
 * to the files (likely via group permissions)
 */
define('FS_METHOD' , 'direct');
