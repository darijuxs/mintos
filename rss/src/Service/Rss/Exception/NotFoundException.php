<?php

namespace App\Service\Rss\Exception;

/**
 * Class NotFoundException
 *
 * @package App\Service\Rss\Exception
 */
class NotFoundException extends RssException
{
    /**
     * NotFoundException constructor.
     */
    public function __construct()
    {
        parent::__construct('Could not load rss feed', 0, null);
    }
}
