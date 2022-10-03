<?php

use Purple\Endpoint\EpIndex;
use Purple\Route\RtDelete;
use Purple\Route\RtGet;
use Purple\Route\RtGroup;
use Purple\Route\RtPost;
use Purple\Route\RtPrefix;
use Purple\Route\RtPut;
use Purple\Route\RtUri;
use Purple\Session\SsDefault;

require_once __DIR__ . '/../vendor/autoload.php';

//echo '<pre>' . var_export($_SERVER, true) . '</pre>';

try {
    (new SsDefault(
        new RtPrefix("projects", new RtGroup(
            new RtGet(new RtUri("/", new EpIndex())),
            new RtPrefix("{project}", new RtGroup(
                new RtGet(new RtUri("edit", new EpEdit())),
                new RtPost(new RtUri("/", new EpCreate())),
                new RtPut(new RtUri('update', new EpUpdate())),
            ))
        ))
    ))->process();
} catch (Exception $e) {
}
