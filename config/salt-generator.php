<?php

function add_salts() {
	$root = dirname(__DIR__);

	$KEYS = array(
		'AUTH_KEY',
		'SECURE_AUTH_KEY',
		'LOGGED_IN_KEY',
		'NONCE_KEY',
		'AUTH_SALT',
		'SECURE_AUTH_SALT',
		'LOGGED_IN_SALT',
		'NONCE_SALT'
	);

	$salts = array_map(function ($key) {
		return sprintf("%s='%s'", $key, generate_salt());
	}, $KEYS);

	$env_file = "{$root}/.env";

	if (!file_exists( $env_file )) {
		if (copy("{$root}/.env.example", $env_file)) {
			file_put_contents($env_file, "\n" . implode($salts, "\n") . "\n\n\n", FILE_APPEND | LOCK_EX);
		} 
	}
	else {
		echo ".env already exists, appending salts. You may have to manually delete old salts";
		file_put_contents($env_file, "\n" . implode($salts, "\n") . "\n\n\n", FILE_APPEND | LOCK_EX);
	}
}

/**
 * Slightly modified/simpler version of wp_generate_password
 * https://github.com/WordPress/WordPress/blob/cd8cedc40d768e9e1d5a5f5a08f1bd677c804cb9/wp-includes/pluggable.php#L1575
 */
function generate_salt($length = 64) {
	$chars  = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	$chars .= '!@#$%^&*()';
	$chars .= '-_ []{}<>~`+=,.;:/?|';

	$salt = '';
	for ($i = 0; $i < $length; $i++) {
		$salt .= substr($chars, rand(0, strlen($chars) - 1), 1);
	}

	return $salt;
}

add_salts();
