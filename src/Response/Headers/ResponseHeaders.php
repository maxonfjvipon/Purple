<?php

namespace Purple\Response\Headers;

use Purple\Headers;

/**
 * Response headers.
 */
interface ResponseHeaders extends Headers
{
    const STATUS = "X-Status";
    const CONTENT_LENGTH = "Content-Length";
    const CONTENT_TYPE = "Content-Type";
    const LOCATION = "Location";
}
