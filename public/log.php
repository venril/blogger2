<?php

use Aston\Logger\Logger;
use Aston\Logger\Store\Handler\File;

// Log.php

require 'Logger/Store';
require 'Logger/Store/Handler/File.php';
require 'Logger/Logger.php';

$store = new File('.log.txt');
$logger = new Logger($store);

// l'avenir 
$e = new Exception('Message',600);
$logger->log($e, Logger::LEVEL_NOTICE);
