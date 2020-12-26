<?php
namespace Lib16\RSS;

use Lib16\XML\XmlElementWrapper;

class SkipHours extends XmlElementWrapper
{
    const NAME = 'skipHours';

    public function hour(int ...$hours): self
    {
        foreach ($hours as $hour) {
            $this->append('hour', $hour);
        }
        return $this;
    }
}