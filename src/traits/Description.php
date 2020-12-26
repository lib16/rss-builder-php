<?php
namespace Lib16\RSS\Traits;

trait Description
{
    public function description(string $description = null): self
    {
        return $this->append('description', $description);
    }
}