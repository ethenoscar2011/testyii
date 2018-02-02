<?php

require_once __DIR__ . '/../yiiLoader.php';

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

if (YIICORE_LOCAL) {
    require YIICORE_APP_VENDOR_PATH . '/autoload.php';
    require YIICORE_APP_VENDOR_PATH . '/yiisoft/yii2/Yii.php';
}

$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config))->run();
