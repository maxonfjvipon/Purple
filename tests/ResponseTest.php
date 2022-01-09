<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Purple\Response\ResponseBasic;

/**
 * @runTestsInSeparateProcesses
 */
class ResponseTest extends TestCase
{
    /**
     * @runInSeparateProcess
     * @throws Exception
     */
    public function testBasicResponse()
    {
        $this->expectOutputString("");
        (new ResponseBasic())->send();
    }

    /**
     * @throws Exception
     */
    public function testBasicResponseModified()
    {
//        $this->expectOutputString("Hello world");
//        (new ResponseBasic(300, ['Content-Type: text/plain'], "Hello world"))->send();
//        $this->assertEquals(300, http_response_code());
        header('Content-Type: text/plain');
        var_dump(xdebug_get_headers());
//        $this->assertEquals('text/plain', $http_response_header['Content-Type']);
    }

}