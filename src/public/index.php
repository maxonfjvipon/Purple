<?php

require __DIR__ . '/../../vendor/autoload.php';

use Purple\Exp\Page\HtmlPage;
use Purple\Exp\Page\PageBy\PageByMethods\Methods\PageByDeleteMethod;
use Purple\Exp\Page\PageBy\PageByMethods\Methods\PageByGetMethod;
use Purple\Exp\Page\PageBy\PageByMethods\Methods\PageByPostMethod;
use Purple\Exp\Page\PageBy\PageByUri;
use Purple\Exp\Page\Pages;
use Purple\Exp\Page\TextPage;
use Purple\Exp\Session\SessionBasic;

try {
    (new SessionBasic(
        new Pages(
            new PageByUri(
                '/create',
                new PageByDeleteMethod(
                    new TextPage("It's create page by GET method")
                )
            ),
            new PageByUri(
                '/create',
                new PageByPostMethod(
                    new HtmlPage('<b>Post create page</b>')
                )
            )
        )
    ))->process();
} catch (Exception $e) {

}