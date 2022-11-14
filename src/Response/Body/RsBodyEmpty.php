<?php

namespace Maxonfjvipon\Purple\Response\Body;

use Maxonfjvipon\ElegantElephant\Txt\TxtBlank;
use Maxonfjvipon\ElegantElephant\Txt\TxtWrap;

/**
 * Empty response body.
 */
final class RsBodyEmpty extends TxtWrap implements ResponseBody
{
    /**
     * Ctor.
     */
    public function __construct()
    {
        parent::__construct(new TxtBlank());
    }
}
