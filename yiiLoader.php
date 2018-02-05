<?php

$coreLoader = __DIR__ . '/../yiicore/yiiLoader.php';
if (!file_exists($coreLoader)) {
    defined('YIICORE_LOCAL') or define('YIICORE_LOCAL', true);
    define('YII_ENV', 'test');
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YIICORE_APP_BASE_PATH') or define('YIICORE_APP_BASE_PATH', __DIR__ . '/');
    defined('YIICORE_APP_VENDOR_PATH') or define('YIICORE_APP_VENDOR_PATH', YIICORE_APP_BASE_PATH . 'vendor');
    require YIICORE_APP_VENDOR_PATH . '/autoload.php';
    require YIICORE_APP_VENDOR_PATH . '/yiisoft/yii2/Yii.php';
} else {
    defined('YIICORE_LOCAL') or define('YIICORE_LOCAL', false);
    require $coreLoader;
}
