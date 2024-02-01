<?php

namespace Pshilyaev\DzenRssOut\ValueObjects;

class NewsItem
{
    protected string $title;
    protected string $link;
    protected string $description;
    protected string $pubDate;

    /**
     * @param string $title
     * @param string $link
     * @param string $description
     * @param string $pubDate
     */
    public function __construct(string $title, string $link, string $description, string $pubDate)
    {
        $timestamp = strtotime($pubDate);
        if ($timestamp === false) {
            throw new \InvalidArgumentException("Invalid date format: {$pubDate}");
        }

        $this->title = $title;
        $this->link = $link;
        $this->description = $description;
        $this->pubDate = $this->formatDate($pubDate);
    }

    protected function formatDate($dateTime)
    {
        // Преобразование в объект DateTime для автоматического преобразования формата
        $dateTimeObject = new \DateTime($dateTime);
        // Форматирование в стандартный формат RSS
        return $dateTimeObject->format(\DateTime::RSS);
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getPubDate(): string
    {
        return $this->pubDate;
    }

}