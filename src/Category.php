<?php

namespace Lib16\RSS;

trait Category
{
	public function category(string $category, string $domain = null): self
	{
		$this->xml->append('category', $category)->attrib('domain', $domain);
		return $this;
	}
}