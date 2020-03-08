<?php

namespace App\Entity\Rss;

/**
 * Class Author
 *
 * @package App\Entity\Feed
 */
class Entry
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $updated;

    /**
     * @var Author
     */
    private $author;

    /**
     * @var string
     */
    private $link;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $originalTitle;

    /**
     * @var string
     */
    private $summary;

    /**
     * @var string
     */
    private $originalSummary;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return Entry
     */
    public function setId(string $id): Entry
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdated(): \DateTime
    {
        return $this->updated;
    }

    /**
     * @param \DateTime $updated
     *
     * @return Entry
     */
    public function setUpdated(\DateTime $updated): Entry
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * @return Author
     */
    public function getAuthor(): Author
    {
        return $this->author;
    }

    /**
     * @param Author $author
     *
     * @return Entry
     */
    public function setAuthor(Author $author): Entry
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @param string $link
     *
     * @return Entry
     */
    public function setLink(string $link): Entry
    {
        $this->link = $link;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return Entry
     */
    public function setTitle(string $title): Entry
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getOriginalTitle(): string
    {
        return $this->originalTitle;
    }

    /**
     * @param string $originalTitle
     *
     * @return Entry
     */
    public function setOriginalTitle(string $originalTitle): Entry
    {
        $this->originalTitle = $originalTitle;

        return $this;
    }

    /**
     * @return string
     */
    public function getSummary(): string
    {
        return $this->summary;
    }

    /**
     * @param string $summary
     *
     * @return Entry
     */
    public function setSummary(string $summary): Entry
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * @return string
     */
    public function getOriginalSummary(): string
    {
        return $this->originalSummary;
    }

    /**
     * @param string $originalSummary
     *
     * @return Entry
     */
    public function setOriginalSummary(string $originalSummary): Entry
    {
        $this->originalSummary = $originalSummary;

        return $this;
    }
}
