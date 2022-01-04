<?php

require __DIR__ . '/../../vendor/autoload.php';

use Purple\Frame\FrRoute\FrRoute;
use Purple\Http\KrBasic;
use Purple\Resources\Frame\FrIndex;
use Purple\Route\RtRegex\RtRegexOfString;

(new KrBasic(
    new FrRoute(
        new RtRegexOfString(
            "/",
            new FrIndex()
        )
    )
))->process();