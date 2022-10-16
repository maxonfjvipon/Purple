<?php

namespace Purple\Response;

use Purple\Headers;
use Purple\Response\Body\ResponseBody;
use Purple\Response\Body\RsBodyEmpty;
use Purple\Response\Headers\ResponseHeaders;
use Purple\Response\Headers\RsHdsEmpty;

/**
 * Empty response.
 */
final class RsEmpty implements Response
{
    /**
     * @var array $cache
     */
    private array $cache = [];

    /**
     * @return ResponseBody
     */
    public function body(): ResponseBody
    {
        return $this->cache['body'] ??= new RsBodyEmpty();
    }

    /**
     * @return ResponseHeaders
     */
    public function headers(): ResponseHeaders
    {
        return $this->cache['headers'] ??= new RsHdsEmpty();
    }
}
