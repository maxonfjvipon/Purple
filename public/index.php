<?php

use Purple\Route\RtGet;
use Purple\Route\RtGroup;
use Purple\Route\RtMethod;
use Purple\Route\RtPost;
use Purple\Route\RtPrefix;
use Purple\Route\RtPut;
use Purple\Route\RtUri;
use Purple\Session\SsDefault;

require_once __DIR__ . '/../vendor/autoload.php';

//echo '<pre>' . var_export($_SERVER, true) . '</pre>';

try {
    (new SsDefault(
        new RtPrefix("projects",
            new RtGroup(
                new RtGet(
                    new RtGroup(
                        new RtUri("/", new EpIndex()),
                        new RtUri('create', new EpCreate())
                    )
                ),
                new RtPost(new RtUri("/", new EpStore())),
                new RtPrefix("{project}",
                    new RtGroup(
                        new RtGet(
                            new RtGroup(
                                new RtUri("edit", new EpEdit()),
                                new RtUri('/', new EpShow())
                            )
                        ),
                        new RtPut(new RtUri("/", new EpUpdate()))
                    )
                )
            )
        )
    ))->process();
} catch (Exception $e) {
}
