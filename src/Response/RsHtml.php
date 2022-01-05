<?php


namespace Purple\Response;


use ElegantBro\Interfaces\Stringify;

class RsHtml extends RsPack implements Stringify
{
    /**
     * @return string
     */
    public function asString(): string
    {
        return '<html lang="ru"><head><title>somebody</title></head><body><div>Hello world</div></body></html>' . "\n\r";
    }
}