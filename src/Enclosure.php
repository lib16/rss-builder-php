<?php
namespace Lib16\RSS;

use Lib16\RSS\Traits\UrlAttribute;
use Lib16\XML\XmlElementWrapper;

class Enclosure extends XmlElementWrapper
{
    use UrlAttribute;

    const NAME = 'enclosure';

    public function setLength(int $length): self
    {
        return $this->attrib('length', $length);
    }

    public function setType(string $type): self
    {
        return $this->attrib('type', $type);
    }
}