<?php

// Log.php

require 'Logger/Store';
require 'Logger/Store/Handler/File.php';
require 'Logger/Logger.php';

$store = new Aston\Logger\Store\Handler\File();
$logger = new Aston\Logger\Logger($store);

// l'avenir 

$logger->log($e);
