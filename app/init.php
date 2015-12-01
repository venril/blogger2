<?php

use Aston\Db\Connection;
use Aston\Logger\Logger;
use Aston\Logger\Manager;
use Aston\Logger\Store\Handler\File;

// blogger/app/init.php

require 'config.php';
set_include_path(
        LIB_PATH.PATH_SEPARATOR.
        APP_PATH . DS. 'src'
        );

function classLoader($classname) {
    require str_replace('\\', DS, $classname). '.php';
}
spl_autoload_register('classLoader');

// logger Init
$file = new File('log.txt');
$logger = new Logger($file);

$logManager = new Manager();
$logManager->addLogger($logger);

// view Init
$layout  ;

$db = new Connection(
        DB_DRIVER,
        DB_HOST,
        DB_NAME,
        DB_USERNAME,
        DB_PASSWORD
        );

$db->setOptions(array (
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES '. DB_ENCODING
));

$db->setPort(DB_PORT);


try {
    $db->connect();
} catch (Exception $ex) {
   echo $ex->getMessage();
    exit;
}

