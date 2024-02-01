<?php


use Pshilyaev\DzenRssOut\FeedGenerator;
use PHPUnit\Framework\TestCase;
use Pshilyaev\DzenRssOut\ValueObjects\NewsItem;

class FeedGeneratorTest extends TestCase
{

    public function testGenerateFeed()
    {
        $feedGenerator = new FeedGenerator("Test channel", "https://yandex.ru", "ru");

        $result = $feedGenerator->generateFeed([new NewsItem(
            'Article Title',
            'http://example.com/article',
            'Article Description',
            'Tue, 4 Jul 2023 04:20:00 +0300')]);

        $expectedWithoutNewlines = str_replace(["\r", "\n"], '', "<?xml version=\"1.0\"?>\n
<rss xmlns:content=\"http://purl.org/rss/1.0/modules/content/\" xmlns:dc=\"http://purl.org/dc/elements/1.1/\" xmlns:media=\"http://search.yahoo.com/mrss/\" xmlns:atom=\"http://www.w3.org/2005/Atom\" xmlns:georss=\"http://www.georss.org/georss\" version=\"2.0\"><channel><title>Test channel</title><link>https://yandex.ru</link><language>ru</language><item><title>Article Title</title><link>http://example.com/article</link><description>Article Description</description><pubDate>Tue, 04 Jul 2023 04:20:00 +0300</pubDate></item></channel></rss>");
        $actualWithoutNewlines = str_replace(["\r", "\n"], '', $result);

        $this->assertEquals($expectedWithoutNewlines, $actualWithoutNewlines);
    }
}
