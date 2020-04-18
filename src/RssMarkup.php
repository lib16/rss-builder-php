<?php
namespace Lib16\RSS;

use Lib16\XML\Xml;

class RssMarkup extends Xml
{

    const MIME_TYPE = 'application/rss+xml';

    const FILENAME_EXTENSION = 'rss';

    public function appendDateTime(
        string $name,
        \DateTime $datetime = null
    ): self {
        if (! is_null($datetime)) {
            $this->append($name, $datetime->format(\DateTime::RSS));
        }
        return $this;
    }
}