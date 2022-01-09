<?php

use Purple\Page\PageBy\PageByMethods\PageByMethods;
use Purple\Page\PageBy\PageByRegex;
use Purple\Page\PageBy\PageByUri;
use Purple\Page\Pages;
use Purple\Page\TextPage;
use Purple\Session\SessionBasic;

require_once __DIR__ . '/../../vendor/autoload.php';

echo '<pre>' . var_export($_SERVER, true) . '</pre>';

SessionBasic::new(
    Pages::new(
        PageByUri::new(
            "/projects",
            Pages::new(
                PageByMethods::new(
                    ["GET"],
                    TextPage::new("GET projects page")
                ),
                PageByMethods::newOfString(
                    "POST",
                    TextPage::new("POST projects page"),
                )
            )
        ),
        PageByUri::new(
            '/projects/create',
            PageByMethods::newOfString(
                "GET",
                TextPage::new("GET create project page")
            )
        )
    )
)->process();

//(new SessionBasic(
//    new Pages(
//        new TextPage("Hello world")
//    )
//))->process();