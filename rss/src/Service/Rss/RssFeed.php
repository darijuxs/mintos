<?php

namespace App\Service\Rss;

use App\Entity\ExcludedWord;
use App\Entity\Rss\Author;
use App\Entity\Rss\Entry;
use App\Entity\Rss\Feed;
use App\Service\Rss\Exception\RssException;
use App\Service\Utils\StringHelper;
use Doctrine\ORM\EntityManagerInterface;

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
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * RssFeed constructor.
     *
     * @param RssReader $reader
     * @param StringHelper $helper
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(RssReader $reader, StringHelper $helper, EntityManagerInterface $entityManager)
    {
        $this->rssReader = $reader;
        $this->stringHelper = $helper;
        $this->entityManager = $entityManager;
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
                    ->setTitle($this->stringHelper->removeSpecialCharacters(strtolower($entry->title)))
                    ->setOriginalTitle($entry->title)
                    ->setAuthor(
                        (new Author())
                            ->setName($entry->author->name)
                            ->setUri($entry->author->uri)
                    )
                    ->setLink((string)$entry->link->attributes()->href)
                    ->setSummary($this->stringHelper->removeSpecialCharacters(strtolower($entry->summary)))
                    ->setOriginalSummary($entry->summary)
                    ->setUpdated(new \DateTime($entry->updated));

                $feed->setEntry($newEntry);
            }

        } catch (RssException $exception) {
        } catch (\Exception $exception) {
        }

        return $feed;
    }

    /**
     * @param Feed $feed
     *
     * @return array
     */
    public function getFrequentWords(Feed $feed): array
    {
        $feedWords = $this->getWordsFromFeed($feed);
        $excludedWords = $this->getExcludedWords();
        arsort($feedWords);

        return array_slice(array_diff_key($feedWords, array_flip($excludedWords)), 0, 10);
    }

    /**
     * @param Feed $feed
     *
     * @return array
     */
    public function getWordsFromFeed(Feed $feed): array
    {
        $feedWords = [];

        foreach ($feed->getEntries() as $entry) {
            /* @var Entry $entry */
            $titleWords = $this->stringHelper->splitWords($entry->getTitle());
            $summaryWords = $this->stringHelper->splitWords($entry->getSummary());

            $feedWords = array_merge($feedWords, $titleWords, $summaryWords);
        }

        return array_count_values($feedWords);
    }

    /**
     * @return array
     */
    public function getExcludedWords(): array
    {
        $excludedWords = $this->entityManager
            ->getRepository(ExcludedWord::class)
            ->getExcludedWords();

        return array_column($excludedWords, 'value');
    }
}
