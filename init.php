<?php
/**
 * Yuniti
 *
 * Sets up important constants for Yuniti
 */

/**
 * Sets the base path for Yuniti
 */
define('ROOT', dirname(__FILE__) . '/');

/**
 * Sets the system folder path
 */
define('SYSTEM_ROOT', ROOT . 'system/');

/**
 * Yuniti autoloader
 *
 * @param  $class_name
 * @return void
 */
function __autoload($class_name)
{
	if (substr($class_name, 0, 7) == 'Yuniti_')
	{
		// Remove the Yuniti_ prefix
		$class = substr($class_name, 7);

		// Change underscores to directories
		$class = str_replace('_', '/', $class);

		if (file_exists(SYSTEM_ROOT . '/classes/' . $class))
		{
			require SYSTEM_ROOT . '/classes/' . $class;
			return;
		}
	}

	throw new Exception("Could not load class $class_name");
}