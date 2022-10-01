<?php

use Purple\Route\Routes;
use Purple\Route\RtDelete;
use Purple\Route\RtGet;
use Purple\Route\RtMethod;
use Purple\Route\RtPost;
use Purple\Route\RtPut;
use Purple\Session\SsDefault;
use Exception;

require_once __DIR__ . '/../vendor/autoload.php';

//echo '<pre>' . var_export($_SERVER, true) . '</pre>';

(new SsDefault(
    new RtPrefix(
        'products',
        new Routes(
            new RtGet(),
            new RtPost(),
            new RtPut(),
            new RtDelete(),
        )
    )
))->process();
