<?php

namespace Purple\Response;

use Purple\Response\Body\ResponseBody;
use Purple\Response\Headers\ResponseHeaders;
use Purple\WithBody;
use Purple\WithHeaders;

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
