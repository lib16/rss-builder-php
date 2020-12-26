<?php
namespace Lib16\RSS;

use Lib16\RSS\Traits\Category;
use Lib16\RSS\Traits\Description;
use Lib16\RSS\Traits\Link;
use Lib16\RSS\Traits\PubDate;
use Lib16\RSS\Traits\Title;
use Lib16\XML\XmlElementWrapper;

class Item extends XmlElementWrapper
{
    use Category, Description, Link, PubDate, Title;

    const NAME = 'item';

    public function author(string $email = null): self
    {
        return $this->append('author', $email);
    }

    public function comments(string $comments): self
    {
        return $this->append('comments', $comments);
    }

    public function enclosure(string $url, int $length, string $type): self
    {
        Enclosure::appendTo($this)
            ->setUrl($url)
            ->setLength($length)
            ->setType($type);
        return $this;
    }

    public function guid(string $guid, bool $isPermaLink = null): self
    {
        Guid::appendTo($this, $guid)->setIsPermaLink($isPermaLink);
        return $this;
    }

    public function source(string $source, string $url): self
    {
        Source::appendTo($this, $source)->setUrl($url);
        return $this;
    }
}