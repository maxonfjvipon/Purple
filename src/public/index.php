<?php

require __DIR__ . '/../../vendor/autoload.php';

use Purple\Exp\Page\HtmlPage;
use Purple\Exp\Page\TextPage;
use Purple\Exp\Session;
use Purple\Frame\FrRoute\FrRoute;
use Purple\Http\KrBasic;
use Purple\Resources\Frame\FrIndex;
use Purple\Route\RtRegex\RtRegex;
use Purple\Route\RtRegex\RtRegexOfStringify;

//echo '<pre>' . var_export($_SERVER, true) . '</pre>';
//echo '<pre>' . var_export($_GET,true) . '</pre>';
//echo '<pre>' . var_export($_POST, true) . '</pre>';

try {
    (new Session(
        new HtmlPage("<div>Hello, <b>World</b></div>")
    ))->process();
} catch (Exception $e) {

}