<?php
namespace Lib16\RSS;

use Lib16\RSS\Traits\DomainAttribute;
use Lib16\XML\XmlElementWrapper;

class Category extends XmlElementWrapper
{
    use DomainAttribute;

    const NAME = 'category';
}