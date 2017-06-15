# Lib16 RSS Builder for PHP 7
A library for creating RSS feeds written in PHP 7.


## Installation with Composer
This package is available on [Composer](https://packagist.org/packages/lib16/rss">packagist</a>, so you can use <a href="https://getcomposer.org) to install it.If applicable add the following to your project's `composer.json` file:

```json
{
    "minimum-stability": "dev",
    "prefer-stable" : true
}
```
Run the following command in your shell:

```
composer require lib16/rss:dev-master
```

## Basic Usage
The following example markup is taken from [en.wikipedia.org/wiki/Rss](https://en.wikipedia.org/wiki/Rss)

```php
&lt;?php

require_once 'vendor/autoload.php';

use Lib16\Calendar\DateTime;
use Lib16\RSS\Channel;
use Lib16\RSS\RssMarkup;

$channel = Channel::create('RSS Title',
        'This is an example of an RSS feed',
        'http://www.example.com/main.html');
$channel
        -&gt;pubDate(DateTime::create('2010-09-06 00:01 +0'))
        -&gt;lastBuildDate(DateTime::create('2009-09-06 16:20 +0'))
        -&gt;ttl(1800);

$channel
        -&gt;item('Example entry',
                'Here is some text containing an interesting description.',
                'http://www.example.com/blog/post/1')
        -&gt;guid('7bd204c6-1655-4c27-aeee-53f933c5395f', true)
        -&gt;pubDate(DateTime::create('2009-09-06 16:20 +0'));

RssMarkup::headerfields();
print $channel;
```
… generates the following output:

```xml
&lt;?xml version="1.0" encoding="UTF-8" ?&gt;
&lt;rss version="2.0"&gt;
    &lt;channel&gt;
        &lt;title&gt;RSS Title&lt;/title&gt;
        &lt;description&gt;This is an example of an RSS feed&lt;/description&gt;
        &lt;link&gt;http://www.example.com/main.html&lt;/link&gt;
        &lt;pubDate&gt;Mon, 06 Sep 2010 00:01:00 +0000&lt;/pubDate&gt;
        &lt;lastBuildDate&gt;Sun, 06 Sep 2009 16:20:00 +0000&lt;/lastBuildDate&gt;
        &lt;ttl&gt;1800&lt;/ttl&gt;
        &lt;item&gt;
            &lt;title&gt;Example entry&lt;/title&gt;
            &lt;description&gt;Here is some text containing an interesting description.&lt;/description&gt;
            &lt;link&gt;http://www.example.com/blog/post/1&lt;/link&gt;
            &lt;guid isPermaLink="true"&gt;7bd204c6-1655-4c27-aeee-53f933c5395f&lt;/guid&gt;
            &lt;pubDate&gt;Sun, 06 Sep 2009 16:20:00 +0000&lt;/pubDate&gt;
        &lt;/item&gt;
    &lt;/channel&gt;
&lt;/rss&gt;
```