<?php
namespace Lib16\RSS;

use Lib16\Utils\Enums\Weekday;
use Lib16\XML\XmlElementWrapper;

class SkipDays extends XmlElementWrapper
{
    const NAME = 'skipDays';

    public function day(Weekday ...$days): self
    {
        foreach ($days as $day) {
            $this->append('day', $day);
        }
        return $this;
    }
}