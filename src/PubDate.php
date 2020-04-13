<?php
namespace Lib16\RSS;

use Lib16\Calendar\DateTime;

trait PubDate
{

    public function pubDate(DateTime $pubDate): self
    {
        $this->xml->append('pubDate', $pubDate->__toString());
        return $this;
    }
}