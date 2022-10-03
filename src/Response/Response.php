<?php

namespace Purple\Response;

use Purple\Response\Body\ResponseBody;
use Purple\WithBody;
use Purple\WithHeaders;

/**
 * The response.
 */
interface Response extends WithHeaders, WithBody
{
    /**
     * Get response body.
     *
     * @return ResponseBody
     */
    public function body(): ResponseBody;
}
