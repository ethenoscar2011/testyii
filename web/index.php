<?php

require_once __DIR__ . '/../yiiLoader.php';

$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config))->run();
