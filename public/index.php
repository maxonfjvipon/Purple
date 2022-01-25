<?php

use Purple\Frame\Frames;
use Purple\Session\SsBasic;

require_once __DIR__ . '/../vendor/autoload.php';

\Purple\Request\RqLive::new();

echo '<pre>' . var_export($_SERVER, true) . '</pre>';
echo '<pre>' . var_export($_REQUEST, true) . '</pre>';
echo '<pre>' . var_export($_POST, true) . '</pre>';

//SsBasic::new(
//    Frames::new()
//)->process();