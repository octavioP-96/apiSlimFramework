<?php
    $container = $app->getContainer();
    $container['logger'] = require __DIR__ . '/logger.php';
    $container['db'] = require __DIR__ . '/database.php';
