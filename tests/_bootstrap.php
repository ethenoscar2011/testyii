<?php

require_once __DIR__ . '/../../yiiLoader.php';

define('YII_ENV', 'test');
defined('YII_DEBUG') or define('YII_DEBUG', true);

if (YIICORE_LOCAL) {
    require YIICORE_APP_VENDOR_PATH . '/autoload.php';
    require YIICORE_APP_VENDOR_PATH . '/yiisoft/yii2/Yii.php';
}
