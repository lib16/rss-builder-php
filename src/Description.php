<?php

namespace Lib16\RSS;

trait Description
{
	public function description(string $description): self
	{
		$this->xml->append('description', $description);
		return $this;
	}
}