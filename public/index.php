<?php

use Purple\Route\RtGroup;
use Purple\Route\RtDelete;
use Purple\Route\RtGet;
use Purple\Route\RtMethod;
use Purple\Route\RtPost;
use Purple\Route\RtPrefix;
use Purple\Route\RtPut;
use Purple\Route\RtUri;
use Purple\Session\SsDefault;
use Exception;

require_once __DIR__ . '/../vendor/autoload.php';

//echo '<pre>' . var_export($_SERVER, true) . '</pre>';

(new SsDefault(
    new RtPrefix(
        'products',
        new RtGroup(
            new RtGet(),
            new RtPost(),
            new RtPut(),
            new RtDelete(),
        )
    )
))->process();
