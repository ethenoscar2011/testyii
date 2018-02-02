<?php

// NOTE: Make sure this file is not accessible when deployed to production
if (!in_array(@$_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1'])) {
    die('You are not allowed to access this file.');
}

require_once __DIR__ . '/../yiiLoader.php';

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'test');

require YIICORE_APP_VENDOR_PATH . '/autoload.php';
require YIICORE_APP_VENDOR_PATH . '/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/test.php';

(new yii\web\Application($config))->run();
