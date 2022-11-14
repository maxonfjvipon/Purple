<?php

namespace Maxonfjvipon\Purple\Response;

use Maxonfjvipon\Purple\WithBody;
use Maxonfjvipon\Purple\WithHeaders;
use Maxonfjvipon\Purple\Response\Body\ResponseBody;
use Maxonfjvipon\Purple\Response\Headers\ResponseHeaders;

/**
 * The response.
 */
interface Response extends WithHeaders, WithBody
{
    /**
     * Get response headers.
     *
     * @return ResponseHeaders
     */
    public function headers(): ResponseHeaders;

    /**
     * Get response body.
     *
     * @return ResponseBody
     */
    public function body(): ResponseBody;

}
