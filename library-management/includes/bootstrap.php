<?php
if (session_status() === PHP_SESSION_NONE) session_start();
$config = require __DIR__ . '/../config/app.php';
date_default_timezone_set($config['timezone']);
define('ROOT_PATH', realpath(__DIR__ . '/..'));
define('PUBLIC_PATH', ROOT_PATH . '/public');
define('APP_NAME', $config['name']);
define('BASE_URL', $config['base_url']);
define('API_URL', $config['api_url']);
define('FINE_PER_DAY', (int)$config['fine_per_day']);
define('MAX_UNRETURNED_ITEMS', (int)$config['max_unreturned_items']);
define('FOOTER_TEXT', $config['footer_text']);
spl_autoload_register(function($class){
    $file = ROOT_PATH . '/' . str_replace('\\','/',$class) . '.php';
    if(file_exists($file)) require_once $file;
});
require_once __DIR__ . '/functions.php';
