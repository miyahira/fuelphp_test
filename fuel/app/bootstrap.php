<?php
// Bootstrap the framework DO NOT edit this
require COREPATH.'bootstrap.php';


Autoloader::add_classes(array(
	// Add classes you want to override here
	// Example: 'View' => APPPATH.'classes/view.php',
));

// Register the autoloader
Autoloader::register();

/**
 * Your environment.  Can be set to any of the following:
 *
 * Fuel::DEVELOPMENT
 * Fuel::TEST
 * Fuel::STAGING
 * Fuel::PRODUCTION
 */
Fuel::$env = (isset($_SERVER['FUEL_ENV']) ? $_SERVER['FUEL_ENV'] : Fuel::DEVELOPMENT);

// Initialize the framework with the config file.
Fuel::init('config.php');

$cleardb = parse_url(getenv('CLEARDB_DATABASE_URL'));
Log::warning("Settings ClearDB...");

Config::load('db', 'db');

$dsn = sprintf("mysql:host=%s; dbname=%s; unix_socket=/var/run/mysqld/mysqld.sock", $cleardb['host'], substr($cleardb['path'], 1));
Log::warning("db.default.connection.dsn = ".$dsn);
Config::set('db.default.connection.dsn', $dsn);

Config::set('db.default.connection.username', $cleardb['user']);
Log::warning("db.default.connection.hostname = ".$cleardb['user']);

Config::set('db.default.connection.password', $cleardb['pass']);
Log::warning("db.default.connection.hostname = ".$cleardb['pass']);

Config::save('db', 'db');
Log::warning( print_r(Config::get('db'), true) );
