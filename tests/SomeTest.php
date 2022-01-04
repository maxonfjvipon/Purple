<?php

use PHPUnit\Framework\TestCase;
use Purple\Frame\FrRoute\FrRoute;
use Purple\Http\KrBasic;
use Purple\Resources\Frame\FrIndex;
use Purple\Route\RtRegex\RtRegexOfString;

class SomeTest extends TestCase
{
    public function testSomebody()
    {
        (new KrBasic(
            new FrRoute(
                new RtRegexOfString(
                    "/",
                    new FrIndex()
                )
            )
        ))->process();
        $this->assertEquals(true, true);
    }

}