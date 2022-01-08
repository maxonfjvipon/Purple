<?php

require __DIR__ . '/../../vendor/autoload.php';

use Purple\Exp\Page\PageBy\PageByMethods\Methods\PageByGetMethod;
use Purple\Exp\Page\PageBy\PageByUri;
use Purple\Exp\Page\Pages;
use Purple\Exp\Page\TextPage;
use Purple\Exp\Session\SessionBasic;

try {
    (new SessionBasic(
        new Pages(
            new PageByUri(
                '/create',
                new TextPage("It's create page")
            )
        )
    ))->process();
} catch (Exception $e) {

}