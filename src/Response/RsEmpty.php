<?php

namespace Purple\Response;

use Purple\Headers;
use Purple\Response\Body\ResponseBody;
use Purple\Response\Body\RsBodyEmpty;
use Purple\Response\Headers\RsHeadersEmpty;

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
     * @return Headers
     */
    public function headers(): Headers
    {
        return $this->cache['headers'] ??= new RsHeadersEmpty();
    }
}
