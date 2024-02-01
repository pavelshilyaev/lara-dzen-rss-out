<?php

namespace Pshilyaev\DzenRssOut;

use Pshilyaev\DzenRssOut\ValueObjects\NewsItem;

class FeedGenerator
{
    protected string $channelName;
    protected string $channelLink;
    protected string $lang = 'ru';

    /**
     * @param string $channelName
     * @param string $channelLink
     * @param string $lang
     */
    public function __construct(string $channelName, string $channelLink, string $lang = 'ru')
    {
        $this->channelName = $channelName;
        $this->channelLink = $channelLink;
        $this->lang = $lang;
    }

    /**
     * @param NewsItem[] $items
     * @return string
     */
    public function generateFeed(array $items) : string
    {
        $xml = new \SimpleXMLElement('<rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:media="http://search.yahoo.com/mrss/" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:georss="http://www.georss.org/georss"></rss>');
        $channel = $xml->addChild('channel');
        $channel->addChild('title', $this->channelName);
        $channel->addChild('link', $this->channelLink);
        $channel->addChild('language', $this->lang);

        foreach ($items as $item) {
            $feedItem = $channel->addChild('item');
            $feedItem->addChild('title', $item->getTitle());
            $feedItem->addChild('link', $item->getLink());
            $feedItem->addChild('description', $item->getDescription());
            $feedItem->addChild('pubDate', $item->getPubDate());
        }

        return $xml->asXML();
    }

}