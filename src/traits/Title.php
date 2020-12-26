<?php
namespace Lib16\RSS\Traits;

trait Title
{
    public function title(string $title = null): self
    {
        return $this->append('title', $title);
    }
}