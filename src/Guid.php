<?php
namespace Lib16\RSS;

use Lib16\XML\XmlElementWrapper;

class Guid extends XmlElementWrapper
{
    const NAME = 'guid';

    public function setIsPermaLink(bool $isPermaLink = null): self
    {
        if ($isPermaLink !== null) {
            $this->attrib('isPermaLink', $isPermaLink ? 'true' : 'false');
        }
        return $this;
    }
}