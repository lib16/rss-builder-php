<?php
namespace Lib16\RSS;

use Lib16\RSS\Enums\Protocol;
use Lib16\RSS\Traits\Category;
use Lib16\RSS\Traits\Description;
use Lib16\RSS\Traits\Link;
use Lib16\RSS\Traits\PubDate;
use Lib16\RSS\Traits\Title;
use Lib16\Utils\Enums\Weekday;
use Lib16\XML\XmlElementWrapper;

class Channel extends XmlElementWrapper
{
    use Category, Description, Link, PubDate, Title;

    const NAME = 'channel';

    public static function create(
        string $title,
        string $description,
        string $link,
        string $language = null,
        \DateTime $lastBuildDate = null,
        \DateTime $pubDate = null,
        int $ttl = null
    ): self {
        return Rss::createChannel(
            $title,
            $description,
            $link,
            $language,
            $lastBuildDate,
            $pubDate,
            $ttl
        );
    }

    public function cloud(
        string $domain,
        int $port,
        string $path,
        string $registerProcedure,
        Protocol $protocol
    ): self {
        Cloud::appendTo($this)
            ->setDomain($domain)
            ->setPort($port)
            ->setPath($path)
            ->setRegisterProcedure($registerProcedure)
            ->setProtocol($protocol);
        return $this;
    }

    public function copyright(string $copyright): self
    {
        return $this->append('copyright', $copyright);
    }

    public function docs(): self
    {
        return $this->append('docs', 'http://www.rssboard.org/rss-specification');
    }

    public function generator(string $generator): self
    {
        return $this->append('generator', $generator);
    }

    public function image(
        string $url,
        string $title,
        string $link,
        int $width = null,
        int $height = null,
        string $description = null
    ): Image { // @todo
        return Image::appendTo($this)
            ->url($url)
            ->title($title)
            ->link($link)
            ->width($width)
            ->height($height)
            ->description($description);
    }

    public function item(
        string $title = null,
        string $description = null,
        string $link = null,
        \DateTime $pubDate = null
    ): Item {
        return Item::appendTo($this)
            ->title($title)
            ->description($description)
            ->link($link)
            ->pubDate($pubDate);
    }

    public function language(string $language = null): self
    {
        return $this->append('language', $language);
    }

    public function lastBuildDate(\DateTime $lastBuildDate = null): self
    {
        return $this->appendDatetime('lastBuildDate', $lastBuildDate);
    }

    public function managingEditor(string $email = null): self
    {
        return $this->append('managingEditor', $email);
    }

    public function rating(string $rating = null): self
    {
        return $this->append('rating', $rating);
    }

    public function skipDays(Weekday ...$days): self
    {
        if ($days) {
            SkipDays::appendTo($this)->day(...$days);
        }
        return $this;
    }

    public function skipHours(int ...$hours): self
    {
        if ($hours) {
            SkipHours::appendTo($this)->hour(...$hours);
        }
        return $this;
    }

    public function textInput(
        string $title,
        string $description,
        string $name,
        string $link
    ): self {
        TextInput::appendTo($this)
            ->title($title)
            ->description($description)
            ->name($name)
            ->link($link);
        return $this;
    }

    public function ttl(int $minutes = null): self
    {
        return $this->append('ttl', $minutes);
    }

    public function webMaster(string $email = null): self
    {
        return $this->append('webMaster', $email);
    }
}