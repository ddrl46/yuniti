<?php
// This file generated by Propel 1.5.4 convert-conf target
// from XML runtime conf file /Users/john/src/yuniti/system/runtime-conf.xml
$conf = array (
  'datasources' => 
  array (
    'yuniti' => 
    array (
      'adapter' => 'mysql',
      'connection' => 
      array (
        'dsn' => 'mysql:host=localhost;dbname=yuniti',
        'user' => 'root',
        'password' => 'root',
      ),
    ),
    'default' => 'yuniti',
  ),
  'generator_version' => '1.5.4',
);
$conf['classmap'] = include(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'classmap-Yuniti-conf.php');
return $conf;