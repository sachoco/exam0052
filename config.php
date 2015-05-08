<?php
use Zend\Loader\StandardAutoloader;
use Zend\Db\Adapter\Adapter;

date_default_timezone_set('Europe/Amsterdam');


// Zend Framework
require_once __DIR__.'/library/Zend/Loader/StandardAutoloader.php';
$loader = new StandardAutoloader(array('autoregister_zf' => true));
$loader->register();

// mySQL　コンフィデンシャル
$adapter = new Adapter(array(
	'driver' => 'Pdo_Mysql',
	'database' => 'exam0052',
	'username' => 'exam0052',
	'password' => 'h3J3BYRrOHYhRYBu',
	'hostname' => 'localhost'
));