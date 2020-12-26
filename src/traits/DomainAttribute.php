<?php
namespace Lib16\RSS\Traits;

trait DomainAttribute
{
    public function setDomain(string $domain = null): self
    {
        return $this->attrib('domain', $domain);
    }
}