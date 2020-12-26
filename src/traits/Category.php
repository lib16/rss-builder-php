<?php
namespace Lib16\RSS\Traits;

trait Category
{
    public function category(string $category, string $domain = null): self
    {
        \Lib16\RSS\Category::appendTo($this, $category)->setDomain($domain);
        return $this;
    }
}