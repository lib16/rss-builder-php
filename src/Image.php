<?php
namespace Lib16\RSS;

use Lib16\RSS\Traits\Description;
use Lib16\RSS\Traits\Link;
use Lib16\RSS\Traits\Title;
use Lib16\XML\XmlElementWrapper;

class Image extends XmlElementWrapper
{
    use Description, Link, Title;

    const NAME = 'image';

    public function url(string $url = null): self
    {
        return $this->append('url', $url);
    }

    public function width(int $width = null): self
    {
        return $this->append('width', $width);
    }

    public function height(int $height = null): self
    {
        return $this->append('height', $height);
    }
}