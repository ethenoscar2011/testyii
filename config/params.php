<?php

$params = [
    'adminEmail' => 'admin@example.com',
];

if (
    defined('YIICORE_COMMON_PARAMS_FILE')
    && file_exists(YIICORE_COMMON_PARAMS_FILE)
) {
    $params = array_merge(
        $params,
        require YIICORE_COMMON_PARAMS_FILE
    );
}
return $params;
