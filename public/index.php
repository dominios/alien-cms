<?php

use Application\Application;

$loader = require __DIR__ . '/../vendor/autoload.php';
$loader->add('Application', implode(DIRECTORY_SEPARATOR, [__DIR__, '..', 'module']));

try {

    header("Content-Type: text/html; charset=UTF8");

    $baseConfig = new SplFileInfo(__DIR__ . "/../module/Application/config/config.php");
    $controllersConfig = new SplFileInfo(__DIR__ . "/../module/Application/config/controllers.php");
    $servicesConfig = new SplFileInfo(__DIR__ . "/../module/Application/config/services.php");

    $config = new \Alien\Configuration($baseConfig, $controllersConfig, $servicesConfig);

    $app = new Application();
    $app->bootstrap($config);

    $app->run();

} catch (\Exception $e) {
    header("Content-Type: text/html; charset=UTF8");
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
    echo "<h1>Internal Server Error</h1>";
    echo "<strong>" . get_class($e) . ": " . $e->getMessage() . "</strong> at <strong>" . $e->getFile() . "</strong> on line <strong>" . $e->getLine() . "</strong>";
    echo "<h2>Stack trace:</h2>";
    echo "<pre>";
    print_r($e->getTraceAsString());
    echo "</pre>";
}