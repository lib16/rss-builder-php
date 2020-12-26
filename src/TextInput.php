<?php
namespace Lib16\RSS;

use Lib16\RSS\Traits\Description;
use Lib16\RSS\Traits\Link;
use Lib16\RSS\Traits\Title;
use Lib16\XML\XmlElementWrapper;

class TextInput extends XmlElementWrapper
{
    use Description, Link, Title;

    const NAME = 'textInput';

    public function name(string $name): self
    {
        return $this->append('name', $name);
    }
}