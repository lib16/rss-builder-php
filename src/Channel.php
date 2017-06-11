<?php

namespace Lib16\RSS;

use Lib16\Calendar\DateTime;
use Lib16\XML\XmlWrapper;

class Channel extends XmlWrapper
{
	use Category, PubDate;

	public function cloud(string $domain, int $port,
			string $path, string $registerProcedure, Protocol $protocol): self
	{
		$this->xml->append('cloud')
				->attrib('domain', $domain)
				->attrib('port', $port)
				->attrib('path', $path)
				->attrib('registerProcedure', $registerProcedure)
				->attrib('protocol', $protocol);
		return $this;
	}

	public function copyright(string $copyright): self
	{
		$this->xml->append('copyright', $copyright);
		return $this;
	}

	public function docs(): self
	{
		$this->xml->append('docs', 'http://www.rssboard.org/rss-specification');
		return $this;
	}

	public function generator(string $generator): self
	{
		$this->xml->append('generator', $generator);
		return $this;
	}

	public function image(string $url, string $title, string $link,
			int $width = null, int $height = null, string $description = null): Image
	{
		$image = new Image($this->xml->append('image'));
		$image->getXml()
				->appendLeaf('url', $url)
				->appendLeaf('title', $title)
				->appendLeaf('link', $link)
				->appendLeaf('width', $width)
				->appendLeaf('height', $height)
				->appendLeaf('description', $description);
		return $image;
	}

	public function item(string $title = null,
			string $description = null, string $link = null, DateTime $pubDate = null): Item
	{
		$item = new Item($this->xml->append('item'));
		$item->getXml()
				->appendLeaf('title', $title)
				->appendLeaf('description', $description)
				->appendLeaf('link', $link)
				->appendLeaf('pubDate', $pubDate);
		return $item;
	}

	public function language(string $language): self
	{
		$this->xml->append('language', $language);
		return $this;
	}

	public function lastBuildDate(DateTime $lastBuildDate): self
	{
		$this->xml->append('lastBuildDate', $lastBuildDate->__toString());
		return $this;
	}

	public function managingEditor(string $email): self
	{
		$this->xml->append('managingEditor', $email);
		return $this;
	}

	public function rating(string $rating): self
	{
		$this->xml->append('rating', $rating);
		return $this;
	}

	public function skipDays(int ...$day): self
	{
		$skipDays = $this->xml->append('skipDays');
		foreach ($day as $day) {
			$skipDays->append('day', $day);
		}
		return $this;
	}

	public function skipHours(int ...$hour): self
	{
		$skipHours = $this->xml->append('skipHours');
		foreach ($hour as $hour) {
			$skipHours->append('hour', $hour);
		}
		return $this;
	}

	public function textInput(string $title, string $description, string $name, string $link): self
	{
		$this->xml->append('textInput')
				->appendLeaf('title', $title)
				->appendLeaf('description', $description)
				->appendLeaf('name', $name)
				->appendLeaf('link', $link);
		return $this;
	}

	public function ttl(int $minutes): self
	{
		$this->xml->append('ttl', $minutes);
		return $this;
	}

	public function webMaster(string $email): self
	{
		$this->xml->append('webMaster', $email);
		return $this;
	}
}