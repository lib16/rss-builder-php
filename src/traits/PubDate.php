<?php
namespace Lib16\RSS\Traits;

trait PubDate
{
    public function pubDate(\DateTime $pubDate = null): self
    {
        return $this->appendDateTime('pubDate', $pubDate);
    }
}