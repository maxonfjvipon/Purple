<?php

namespace Maxonfjvipon\Purple\Response\Headers;

use Maxonfjvipon\Purple\Headers;

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
