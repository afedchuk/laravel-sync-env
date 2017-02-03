<?php
/**
 * @link http://fuel.rocketroute.com/
 * @copyright (c) 2017 RocketRoute Ltd
 */

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/src/EnvLoader.php';
require __DIR__ . '/src/EnvSyncService.php';
require __DIR__ . '/src/CommandBasic.php';

(new RocketRoute\EnvUpdater\CommandBasic($argv))->handle();