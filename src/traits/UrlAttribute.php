<?php
namespace Lib16\RSS\Traits;

trait UrlAttribute
{
    public function setUrl(string $url): self
    {
        return $this->attrib('url', $url);
    }
}