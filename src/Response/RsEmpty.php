<?php

namespace Maxonfjvipon\Purple\Response;

use Maxonfjvipon\Purple\Response\Body\ResponseBody;
use Maxonfjvipon\Purple\Response\Body\RsBodyEmpty;
use Maxonfjvipon\Purple\Response\Headers\ResponseHeaders;
use Maxonfjvipon\Purple\Response\Headers\RsHdsEmpty;

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
