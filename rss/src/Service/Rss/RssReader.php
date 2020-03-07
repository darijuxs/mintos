<?php

namespace App\Service\Rss;

use App\Service\Rss\Exception\NotFoundException;

/**
 * Class RssReader
 *
 * @package App\Service\Rss
 */
class RssReader
{
    /**
     * @var string
     */
    private $rssUrl;

    /**
     * @var \SimpleXMLElement
     */
    private $rss;

    /**
     * RssReader constructor.
     *
     * @param string $rssUrl
     */
    public function __construct(string $rssUrl)
    {
        $this->rssUrl = $rssUrl;
    }

    /**
     * @return \SimpleXMLElement
     */
    public function getRss(): \SimpleXMLElement
    {
        return $this->rss;
    }

    /**
     * @return \SimpleXMLElement
     *
     * @throws NotFoundException
     */
    public function read(): \SimpleXMLElement
    {
        try {
            $this->rss = simplexml_load_file($this->rssUrl);
        } catch (\Exception $exception) {
            throw new NotFoundException();
        }

        return $this->rss;
    }
}
