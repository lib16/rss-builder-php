<?php
namespace Lib16\RSS;

use Lib16\XML\XmlElementWrapper;

class Rss extends XmlElementWrapper
{
    const NAME = 'rss';

    public static function create(): self
    {
        return (new static(RssMarkup::createRoot(static::NAME)))->attrib('version', '2.0');
    }

    public function channel(
        string $title,
        string $description,
        string $link,
        string $language = null,
        \DateTime $lastBuildDate = null,
        \DateTime $pubDate = null,
        int $ttl = null
    ): Channel {
        return Channel::appendTo($this)
            ->title($title)
            ->description($description)
            ->link($link)
            ->language($language)
            ->lastBuildDate($lastBuildDate)
            ->pubDate($pubDate)
            ->ttl($ttl);
    }

    public static function createChannel(
        string $title,
        string $description,
        string $link,
        string $language = null,
        \DateTime $lastBuildDate = null,
        \DateTime $pubDate = null,
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