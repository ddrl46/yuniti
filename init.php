<?php
/**
 * Yuniti
 *
 * Sets up important constants for Yuniti
 */

/**
 * We <3 Errors
 */
ini_set('display_errors', 1);
error_reporting(E_STRICT | E_ERROR | E_WARNING | E_PARSE | E_COMPILE_ERROR | E_USER_ERROR | E_USER_WARNING);

/**
 * Sets the base path for Yuniti
 */
define('ROOT', dirname(__FILE__) . '/');

/**
 * Sets the system folder path
 */
define('SYSTEM_ROOT', ROOT . 'system/');

/**
 * Set the timezone
 */
date_default_timezone_set('UTC');

/**
 * Propel setup
 */
require_once SYSTEM_ROOT . 'lib/propel/Propel.php';
Propel::init(SYSTEM_ROOT . 'orm/conf/Yuniti-conf.php');
set_include_path(SYSTEM_ROOT . PATH_SEPARATOR . get_include_path());

/**
 * Yuniti autoloader
 *
 * @param  $class_name
 * @return void
 */
function __autoload($class_name)
{
	// All Yuniti classes begin with a prefix
	if (substr($class_name, 0, 7) == 'Yuniti_')
	{
		// Remove the Yuniti_ prefix
		$class = substr($class_name, 7);

		// Change underscores to directories
		$class = str_replace('_', '/', $class);

		// Lowercase
		$class = strtolower($class);

		if (file_exists(SYSTEM_ROOT . '/classes/' . $class))
		{
			require_once SYSTEM_ROOT . '/classes/' . $class;
			return;
		}
	}
	// Unless it's the core class itself
	elseif ($class_name == 'Yuniti')
	{
		require_once SYSTEM_ROOT . '/classes/yuniti.php';
	}

	throw new Exception("Could not load class $class_name");
}
