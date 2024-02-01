<?php

namespace ValueObjects;

use Pshilyaev\DzenRssOut\ValueObjects\NewsItem;
use PHPUnit\Framework\TestCase;

class NewsItemTest extends TestCase
{

    public function testValidItemCreated()
    {
        $newsItem = new NewsItem("Test title", "https://yandex.ru", "Test description", "01.01.2024 10:00:00");

        $this->assertEquals("Test title", $newsItem->getTitle());
        $this->assertEquals("https://yandex.ru", $newsItem->getLink());
        $this->assertEquals("Test description", $newsItem->getDescription());
        $this->assertEquals("Mon, 01 Jan 2024 10:00:00 +0000", $newsItem->getPubDate());
    }

    public function testValidItemCreationFail()
    {
        $this->expectException(\InvalidArgumentException::class);
        $newsItem = new NewsItem("Test title", "https://yandex.ru", "Test description", "data");
    }
}
