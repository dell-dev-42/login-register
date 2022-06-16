<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'config.php';
require_once __DIR__ . '/vendor/autoload.php';

use Pecee\SimpleRouter\SimpleRouter;

/* Load external routes file */

require_once 'routes.php';

/**
 * The default namespace for route-callbacks, so we don't have to specify it each time.
 * Can be overwritten by using the namespace config option on your routes.
 */

SimpleRouter::setDefaultNamespace('Calculator\Application\Controllers');

// Start the routing
SimpleRouter::start();
