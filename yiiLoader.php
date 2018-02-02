<?php 

$coreLoader = __DIR__ . '/../yiicore/yiiLoader.php';
if (!file_exists($coreLoader)) {
    defined('YIICORE_APP_BASE_PATH') or define('YIICORE_APP_BASE_PATH', __DIR__ . '/');
    defined('YIICORE_APP_VENDOR_PATH') or define('YIICORE_APP_VENDOR_PATH', YIICORE_APP_BASE_PATH . 'vendor');
}
