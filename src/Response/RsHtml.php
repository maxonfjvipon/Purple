<?php


namespace Purple\Response;


use ElegantBro\Interfaces\Stringify;
use Purple\Response;

class RsHtml extends RsPack implements Stringify
{
    /**
     * @return string
     */
    public function asString(): string
    {
        return "<div>Hello world</div>\n\r";
    }
}