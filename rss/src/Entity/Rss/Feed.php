<?php

namespace App\Entity\Rss;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Feed
 *
 * @package App\Entity\Feed
 */
class Feed
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $rights;


    /**
     * @var Author
     */
    private $author;

    /**
     * @var string
     */
    private $icon;

    /**
     * @var string
     */
    private $subtitle;

    /**
     * @var string
     */
    private $logo;

    /**
     * @var \DateTime
     */
    private $updated;

    /**
     * @var Entry[]
     */
    private $entries;

    /**
     * Feed constructor.
     */
    public function __construct()
    {
        $this->entries = new ArrayCollection();
    }

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
     * @return Feed
     */
    public function setId(string $id): Feed
    {
        $this->id = $id;

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
     * @return Feed
     */
    public function setTitle(string $title): Feed
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getRights(): string
    {
        return $this->rights;
    }

    /**
     * @param string $rights
     *
     * @return Feed
     */
    public function setRights(string $rights): Feed
    {
        $this->rights = $rights;

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
     * @return Feed
     */
    public function setAuthor(Author $author): Feed
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * @param string $icon
     *
     * @return Feed
     */
    public function setIcon(string $icon): Feed
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * @return string
     */
    public function getSubtitle(): string
    {
        return $this->subtitle;
    }

    /**
     * @param string $subtitle
     *
     * @return Feed
     */
    public function setSubtitle(string $subtitle): Feed
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * @return string
     */
    public function getLogo(): string
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     *
     * @return Feed
     */
    public function setLogo(string $logo): Feed
    {
        $this->logo = $logo;

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
     * @return Feed
     */
    public function setUpdated(\DateTime $updated): Feed
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getEntries(): ArrayCollection
    {
        return $this->entries;
    }

    /**
     * @param Entry[] $entries
     *
     * @return Feed
     */
    public function setEntries(array $entries): Feed
    {
        $this->entries = $entries;

        return $this;
    }

    /**
     * @param Entry $entry
     *
     * @return Feed
     */
    public function setEntry(Entry $entry): Feed
    {
        $this->entries->add($entry);

        return $this;
    }
}
