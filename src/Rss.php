<?php
namespace Lib16\RSS;

use Lib16\Calendar\DateTime;
use Lib16\XML\XmlWrapper;

class Rss extends XmlWrapper
{

    public static function create(): self
    {
        return new Rss(RssMarkup::createRoot('rss')->attrib('version', '2.0'));
    }

    public function channel(
        string $title,
        string $description,
        string $link,
        string $language = null,
        DateTime $lastBuildDate = null,
        DateTime $pubDate = null,
        int $ttl = null
    ): Channel {
        $channel = new Channel($this->xml->append('channel'));
        $channel->getXml()
            ->appendLeaf('title', $title)
            ->appendLeaf('description', $description)
            ->appendLeaf('link', $link)
            ->appendLeaf('language', $language)
            ->appendLeaf('lastBuildDate', $lastBuildDate)
            ->appendLeaf('pubDate', $pubDate)
            ->appendLeaf('ttl', $ttl);
        return $channel;
    }

    public static function createChannel(
        string $title,
        string $description,
        string $link,
        string $language = null,
        DateTime $lastBuildDate = null,
        DateTime $pubDate = null,
        int $ttl = null
    ): Channel {
        return self::create()->channel(
            $title,
            $description,
            $link,
            $language,
            $lastBuildDate,
            $pubDate,
            $ttl
        );
    }
}