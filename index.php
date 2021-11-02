<?php
/*
 * Входная точка приложения. Можно было поместить в директорию public, чтобы ограничить доступ к файлом через
 * HTTP, но это лишь усложнит восприятие кода в рамках этой задачи.
*/
use app\App;

defined("APP_DIR") or define("APP_DIR", __DIR__);

require_once "autoload.php";

$app = new App();
$app->run();