<?php
namespace Lib16\RSS;

trait PubDate
{
    public function pubDate(\DateTime $pubDate = null): self
    {
        $this->xml->appendDateTime('pubDate', $pubDate);
        return $this;
    }
}