<?php
namespace Lib16\RSS;

use Lib16\RSS\Traits\UrlAttribute;
use Lib16\XML\XmlElementWrapper;

class Source extends XmlElementWrapper
{
    use UrlAttribute;

    const NAME = 'source';
}