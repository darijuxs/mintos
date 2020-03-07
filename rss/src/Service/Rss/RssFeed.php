<?php

namespace App\Service\Rss;

use App\Entity\Rss\Author;
use App\Entity\Rss\Entry;
use App\Entity\Rss\Feed;
use App\Service\Rss\Exception\RssException;
use App\Service\Utils\StringHelper;

/**
 * Class RssFeed
 *
 * @package App\Service\Rss
 */
class RssFeed
{
    /**
     * @var RssReader
     */
    private $rssReader;

    /**
     * @var RssReader
     */
    private $stringHelper;

    /**
     * RssFeed constructor.
     *
     * @param RssReader $reader
     * @param StringHelper $helper
     */
    public function __construct(RssReader $reader, StringHelper $helper)
    {
        $this->rssReader = $reader;
        $this->stringHelper = $helper;
    }

    /**
     * @return Feed
     */
    public function getFeed(): Feed
    {
        $feed = new Feed();
        try {
            $this->rssReader->read();
            $rssFeed = $this->rssReader->getRss();

            $feed
                ->setId($rssFeed->id)
                ->setTitle($rssFeed->title)
                ->setSubtitle($rssFeed->subtitle)
                ->setRights($rssFeed->rights)
                ->setAuthor(
                    (new Author())
                        ->setEmail($rssFeed->author->email)
                        ->setName($rssFeed->author->name)
                        ->setUri($rssFeed->author->uri)
                )
                ->setIcon($rssFeed->icon)
                ->setLogo($rssFeed->logo)
                ->setUpdated(
                    new \DateTime($rssFeed->updated)
                );

            foreach ($rssFeed->entry as $entry) {
                $newEntry = (new Entry())
                    ->setId($entry->id)
                    ->setTitle($entry->title)
                    ->setAuthor(
                        (new Author())
                            ->setName($entry->author->name)
                            ->setUri($entry->author->uri)
                    )
                    ->setLink((string) $entry->link->attributes()->href)
                    ->setSummary($this->stringHelper->removeSpecialCharacters($entry->summary))
                    ->setOriginalSummary($entry->summary)
                    ->setUpdated(new \DateTime($entry->updated));

                $feed->setEntry($newEntry);
            }

        } catch (RssException $exception) {
        } catch (\Exception $exception) {
        }

        return $feed;
    }
}
