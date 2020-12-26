<?php
namespace Lib16\RSS;

use Lib16\RSS\Enums\Protocol;
use Lib16\RSS\Traits\DomainAttribute;
use Lib16\XML\XmlElementWrapper;

class Cloud extends XmlElementWrapper
{
    use DomainAttribute;

    const NAME = 'cloud';

    public function setPort(int $port): self
    {
        return $this->attrib('port', $port);
    }

    public function setPath(string $path): self
    {
        return $this->attrib('path', $path);
    }

    public function setRegisterProcedure(string $registerProcedure): self
    {
        return $this->attrib('registerProcedure', $registerProcedure);
    }

    public function setProtocol(Protocol $protocol): self
    {
        return $this->attrib('protocol', $protocol->__toString()); // @todo
    }
}