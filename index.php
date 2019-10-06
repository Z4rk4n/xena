<?php

require __DIR__ . "/core/Kernel.php";

define("URI", $_SERVER["REQUEST_URI"]);
define("ROOT", $_SERVER["DOCUMENT_ROOT"]);
define("CORE_DIR", ROOT . "/core");
define("APP_DIR", ROOT . "/app");

require __DIR__ . "/core/plugins/debug/MsDebug.php";
require __DIR__ . "/core/plugins/routing/Router.php";

$kernel = new Kernel();
$kernel->boot();