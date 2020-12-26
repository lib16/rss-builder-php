<?php
namespace Lib16\RSS\Traits;

trait Link
{
    public function link(string $link = null): self
    {
        return $this->append('link', $link);
    }
}