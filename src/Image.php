<?php
namespace Lib16\RSS;

use Lib16\XML\XmlWrapper;

class Image extends XmlWrapper
{
    use Description;

    public function width(int $width): self
    {
        $this->xml->append('width', $width);
        return $this;
    }

    public function height(int $height): self
    {
        $this->xml->append('height', $height);
        return $this;
    }
}