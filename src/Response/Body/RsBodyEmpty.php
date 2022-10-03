<?php

namespace Purple\Response\Body;

use Maxonfjvipon\Elegant_Elephant\Text\TxtBlank;
use Maxonfjvipon\Elegant_Elephant\Text\TxtEnvelope;

/**
 * Empty response body.
 */
final class RsBodyEmpty extends TxtEnvelope implements ResponseBody
{
    /**
     * Ctor.
     */
    public function __construct()
    {
        parent::__construct(new TxtBlank());
    }
}
