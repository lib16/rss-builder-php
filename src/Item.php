<?php
namespace Lib16\RSS;

use Lib16\XML\XmlWrapper;

class Item extends XmlWrapper
{
    use Category, Description, PubDate;

    public function author(string $email): self
    {
        $this->xml->append('author', $email);
        return $this;
    }

    public function comments(string $comments): self
    {
        $this->xml->append('comments', $comments);
        return $this;
    }

    public function enclosure(string $url, int $length, string $type): self
    {
        $this->xml->append('enclosure')
            ->attrib('url', $url)
            ->attrib('length', $length)
            ->attrib('type', $type);
        return $this;
    }

    public function guid(string $guid, bool $isPermaLink = null): self
    {
        $isPermaLink = $isPermaLink === null
            ? null
            : ($isPermaLink ? 'true' : 'false');
        $this->xml->append('guid', $guid)->attrib('isPermaLink', $isPermaLink);
        return $this;
    }

    public function link(string $link): self
    {
        $this->xml->append('link', $link);
        return $this;
    }

    public function source(string $source, string $url): self
    {
        $this->xml->append('source', $source)->attrib('url', $url);
        return $this;
    }

    public function title(string $title): self
    {
        $this->xml->append('title', $title);
        return $this;
    }
}