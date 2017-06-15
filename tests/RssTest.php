<?php

namespace Lib16\RSS\Tests;

use Lib16\Calendar\DateTime;
use Lib16\RSS\Category;
use Lib16\RSS\Channel;
use Lib16\RSS\Description;
use Lib16\RSS\Protocol;
use Lib16\RSS\PubDate;
use Lib16\RSS\Rss;
use Lib16\XML\Tests\XmlTestCase;

require_once 'vendor/autoload.php';
require_once 'vendor/lib16/xml/tests/XmlTestCase.php';


class RssTest extends XmlTestCase
{
	public function provider(): array
	{
		return [
			// channel()
			[
				Rss::create()->channel(
						'Lorem Ipsum', 'lorem ipsum', 'http://example.com/feed.rss',
						'en', DateTime::create(6, 6, 2017), DateTime::create(8, 6, 2017), 180),
				self::XML_DECL . '
<rss version="2.0">
	<channel>
		<title>Lorem Ipsum</title>
		<description>lorem ipsum</description>
		<link>http://example.com/feed.rss</link>
		<language>en</language>
		<lastBuildDate>Tue, 06 Jun 2017 00:00:00 +0200</lastBuildDate>
		<pubDate>Thu, 08 Jun 2017 00:00:00 +0200</pubDate>
		<ttl>180</ttl>
	</channel>
</rss>'
			],
			// Channel::create()
			[
				Channel::create(
						'Lorem Ipsum', 'lorem ipsum', 'http://example.com/feed.rss',
						'en', DateTime::create(6, 6, 2017), DateTime::create(8, 6, 2017), 180),
				self::XML_DECL . '
<rss version="2.0">
	<channel>
		<title>Lorem Ipsum</title>
		<description>lorem ipsum</description>
		<link>http://example.com/feed.rss</link>
		<language>en</language>
		<lastBuildDate>Tue, 06 Jun 2017 00:00:00 +0200</lastBuildDate>
		<pubDate>Thu, 08 Jun 2017 00:00:00 +0200</pubDate>
		<ttl>180</ttl>
	</channel>
</rss>'
			],
			// Channel methods
			[
				Rss::create()
				->channel('Lorem Ipsum', 'lorem ipsum', 'http://example.com/feed.rss')
				->category('music', 'http://example.com/music')
				->cloud('rpc.sys.com', 80, '/RPC2',
						'myCloud.rssPleaseNotify', Protocol::XML_RPC())
				->copyright('Lorem Ipsum')
				->docs()
				->generator('Lorem Ipsum')
				->language('en')
				->lastBuildDate(DateTime::create(6, 6, 2017))
				->managingEditor('someone@example.com')
				->pubDate(DateTime::create(8, 6, 2017))
				->rating('Lorem Ipsum')
				->skipDays(0, 1)
				->skipHours(0, 1, 2)
				->textInput('Lorem Ipsum', 'Lorem ipsum',
						'search', 'http://example.com/search')
				->ttl(180)
				->webMaster('someone@example.com'),

				self::XML_DECL . '
<rss version="2.0">
	<channel>
		<title>Lorem Ipsum</title>
		<description>lorem ipsum</description>
		<link>http://example.com/feed.rss</link>
		<category domain="http://example.com/music">music</category>
		<cloud domain="rpc.sys.com" port="80" path="/RPC2" registerProcedure="myCloud.rssPleaseNotify" protocol="xml-rpc"/>
		<copyright>Lorem Ipsum</copyright>
		<docs>http://www.rssboard.org/rss-specification</docs>
		<generator>Lorem Ipsum</generator>
		<language>en</language>
		<lastBuildDate>Tue, 06 Jun 2017 00:00:00 +0200</lastBuildDate>
		<managingEditor>someone@example.com</managingEditor>
		<pubDate>Thu, 08 Jun 2017 00:00:00 +0200</pubDate>
		<rating>Lorem Ipsum</rating>
		<skipDays>
			<day>0</day>
			<day>1</day>
		</skipDays>
		<skipHours>
			<hour>0</hour>
			<hour>1</hour>
			<hour>2</hour>
		</skipHours>
		<textInput>
			<title>Lorem Ipsum</title>
			<description>Lorem ipsum</description>
			<name>search</name>
			<link>http://example.com/search</link>
		</textInput>
		<ttl>180</ttl>
		<webMaster>someone@example.com</webMaster>
	</channel>
</rss>'
			],
			// image()
			[
				Rss::create()
				->channel('Lorem Ipsum', 'Lorem ipsum', 'http://example.com')
				->image('http://example.com/logo.png',
						'Lorem Ipsum', 'http://example.com', 120, 100, 'Lorem ipsum'),
				'<?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0">
	<channel>
		<title>Lorem Ipsum</title>
		<description>Lorem ipsum</description>
		<link>http://example.com</link>
		<image>
			<url>http://example.com/logo.png</url>
			<title>Lorem Ipsum</title>
			<link>http://example.com</link>
			<width>120</width>
			<height>100</height>
			<description>Lorem ipsum</description>
		</image>
	</channel>
</rss>'
			],
			// Image methods
			[
				Rss::create()
				->channel('Lorem Ipsum', 'Lorem ipsum', 'http://example.com')
				->image('http://example.com/logo.png', 'Lorem Ipsum', 'http://example.com')
				->width(120)
				->height(100)
				->description('Lorem ipsum'),
				'<?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0">
	<channel>
		<title>Lorem Ipsum</title>
		<description>Lorem ipsum</description>
		<link>http://example.com</link>
		<image>
			<url>http://example.com/logo.png</url>
			<title>Lorem Ipsum</title>
			<link>http://example.com</link>
			<width>120</width>
			<height>100</height>
			<description>Lorem ipsum</description>
		</image>
	</channel>
</rss>'
			],
			// item()
			[
				Rss::create()
				->channel('Lorem Ipsum', 'Lorem ipsum', 'http://example.com')
				->item('Lorem Ipsum', 'Lorem ipsum', 'http://example.com/articles/123',
						DateTime::create(10, 6, 2017)),
				'<?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0">
	<channel>
		<title>Lorem Ipsum</title>
		<description>Lorem ipsum</description>
		<link>http://example.com</link>
		<item>
			<title>Lorem Ipsum</title>
			<description>Lorem ipsum</description>
			<link>http://example.com/articles/123</link>
			<pubDate>Sat, 10 Jun 2017 00:00:00 +0200</pubDate>
		</item>
	</channel>
</rss>'
			],
			// Item methods
			[
				Rss::create()
				->channel('Lorem Ipsum', 'Lorem ipsum', 'http://example.com')
				->item()
				->author('someone@example.com')
				->category('music', 'http://example.com/music')
				->comments('http://example.com/articles/123/comments')
				->description('Lorem ipsum')
				->enclosure('http://example.com/mp3/123.mp3', 123456, 'audio/mpeg')
				->guid('http://example.com/articles/123', true)
				->link('http://example.com/articles/123')
				->pubDate(DateTime::create(10, 6, 2017))
				->title('Lorem Ipsum'),
				'<?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0">
	<channel>
		<title>Lorem Ipsum</title>
		<description>Lorem ipsum</description>
		<link>http://example.com</link>
		<item>
			<author>someone@example.com</author>
			<category domain="http://example.com/music">music</category>
			<comments>http://example.com/articles/123/comments</comments>
			<description>Lorem ipsum</description>
			<enclosure url="http://example.com/mp3/123.mp3" length="123456" type="audio/mpeg"/>
			<guid isPermaLink="true">http://example.com/articles/123</guid>
			<link>http://example.com/articles/123</link>
			<pubDate>Sat, 10 Jun 2017 00:00:00 +0200</pubDate>
			<title>Lorem Ipsum</title>
		</item>
	</channel>
</rss>'
			],
		];
	}
}