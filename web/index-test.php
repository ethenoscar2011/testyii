<?php

// NOTE: Make sure this file is not accessible when deployed to production
if (!in_array(@$_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1'])) {
    die('You are not allowed to access this file.');
}

require_once __DIR__ . '/../yiiLoader.php';

$config = require __DIR__ . '/../config/test.php';

(new yii\web\Application($config))->run();
