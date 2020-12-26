<?php
namespace Lib16\RSS\Tests;

use Lib16\Utils\Enums\Weekday;
use Lib16\RSS\Channel;
use Lib16\RSS\Enums\Protocol;
use Lib16\RSS\Rss;
use PHPUnit\Framework\TestCase;

class RssTest extends TestCase
{
    static $datetime1, $datetime2, $datetime3;

    public function setUp()
    {
        $timezone = new \DateTimeZone('UTC');
        self::$datetime1 = new \DateTime('2017-06-06', $timezone);
        self::$datetime2 = new \DateTime('2017-06-08', $timezone);
        self::$datetime3 = new \DateTime('2017-06-10', $timezone);
    }

    public function testChannel()
    {
        $actual = Rss::create()->channel(
            'Lorem Ipsum',
            'lorem ipsum',
            'http://example.com/feed.rss',
            'en',
            self::$datetime1,
            self::$datetime2,
            180
        );
        $expected = '<?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0">
	<channel>
		<title>Lorem Ipsum</title>
		<description>lorem ipsum</description>
		<link>http://example.com/feed.rss</link>
		<language>en</language>
		<lastBuildDate>Tue, 06 Jun 2017 00:00:00 +0000</lastBuildDate>
		<pubDate>Thu, 08 Jun 2017 00:00:00 +0000</pubDate>
		<ttl>180</ttl>
	</channel>
</rss>';
        $this->assertEquals($expected, $actual->__toString());
    }

    public function testChannelCreate()
    {
        $actual = Channel::create(
            'Lorem Ipsum',
            'lorem ipsum',
            'http://example.com/feed.rss',
            'en',
            self::$datetime1,
            self::$datetime2,
            180
        );
        $expected = '<?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0">
	<channel>
		<title>Lorem Ipsum</title>
		<description>lorem ipsum</description>
		<link>http://example.com/feed.rss</link>
		<language>en</language>
		<lastBuildDate>Tue, 06 Jun 2017 00:00:00 +0000</lastBuildDate>
		<pubDate>Thu, 08 Jun 2017 00:00:00 +0000</pubDate>
		<ttl>180</ttl>
	</channel>
</rss>';
        $this->assertEquals($expected, $actual);
    }

    public function testChannelMethods()
    {
        $actual = Rss::create()
            ->channel('Lorem Ipsum', 'lorem ipsum', 'http://example.com/feed.rss')
            ->category('music', 'http://example.com/music')
            ->cloud(
                'rpc.sys.com',
                80,
                '/RPC2',
                'myCloud.rssPleaseNotify',
                Protocol::XML_RPC()
            )
            ->copyright('Lorem Ipsum')
            ->docs()
            ->generator('Lorem Ipsum')
            ->language('en')
            ->lastBuildDate(self::$datetime1)
            ->managingEditor('someone@example.com')
            ->pubDate(self::$datetime2)
            ->rating('Lorem Ipsum')
            ->skipDays(Weekday::MON(), Weekday::TUE())
            ->skipHours(0, 1, 2)
            ->textInput(
                'Lorem Ipsum',
                'Lorem ipsum',
                'search',
                'http://example.com/search'
            )
            ->ttl(180)
            ->webMaster('someone@example.com');
        $expected = '<?xml version="1.0" encoding="UTF-8" ?>
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
		<lastBuildDate>Tue, 06 Jun 2017 00:00:00 +0000</lastBuildDate>
		<managingEditor>someone@example.com</managingEditor>
		<pubDate>Thu, 08 Jun 2017 00:00:00 +0000</pubDate>
		<rating>Lorem Ipsum</rating>
		<skipDays>
			<day>Monday</day>
			<day>Tuesday</day>
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
</rss>';
        $this->assertEquals($expected, $actual->__toString());
    }

    public function testImage()
    {
        $actual = Rss::create()
            ->channel('Lorem Ipsum', 'Lorem ipsum', 'http://example.com')
            ->image(
                'http://example.com/logo.png',
                'Lorem Ipsum',
                'http://example.com',
                120,
                100,
                'Lorem ipsum'
            );
        $expected = '<?xml version="1.0" encoding="UTF-8" ?>
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
</rss>';
        $this->assertEquals($expected, $actual);
    }

    public function testImageMethods()
    {
        $actual = Rss::create()
            ->channel(
                'Lorem Ipsum',
                'Lorem ipsum',
                'http://example.com'
            )
            ->image(
                'http://example.com/logo.png',
                'Lorem Ipsum',
                'http://example.com'
            )
            ->width(120)
            ->height(100)
            ->description('Lorem ipsum');
        $expected = '<?xml version="1.0" encoding="UTF-8" ?>
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
</rss>';
        $this->assertEquals($expected, $actual);
    }

    public function testItem()
    {
        $actual = Rss::create()
            ->channel(
                'Lorem Ipsum',
                'Lorem ipsum',
                'http://example.com'
            )
            ->item(
                'Lorem Ipsum',
                'Lorem ipsum',
                'http://example.com/articles/123',
                self::$datetime3
            );
        $expected = '<?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0">
	<channel>
		<title>Lorem Ipsum</title>
		<description>Lorem ipsum</description>
		<link>http://example.com</link>
		<item>
			<title>Lorem Ipsum</title>
			<description>Lorem ipsum</description>
			<link>http://example.com/articles/123</link>
			<pubDate>Sat, 10 Jun 2017 00:00:00 +0000</pubDate>
		</item>
	</channel>
</rss>';
        $this->assertEquals($expected, $actual->__toString());
    }

    public function testItemMethods()
    {
        $actual = Rss::create()
            ->channel('Lorem Ipsum', 'Lorem ipsum', 'http://example.com')
            ->item()
            ->author('someone@example.com')
            ->category('music', 'http://example.com/music')
            ->comments('http://example.com/articles/123/comments')
            ->description('Lorem ipsum')
            ->enclosure('http://example.com/mp3/123.mp3', 123456, 'audio/mpeg')
            ->guid('http://example.com/articles/123')
            ->guid('http://example.com/articles/123', true)
            ->guid('com.example.articles.123', false)
            ->link('http://example.com/articles/123')
            ->pubDate(self::$datetime3)
            ->source('Tomalak\'s Realm', 'http://www.tomalak.org/links2.xml')
            ->title('Lorem Ipsum');
        $expected = '<?xml version="1.0" encoding="UTF-8" ?>
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
			<guid>http://example.com/articles/123</guid>
			<guid isPermaLink="true">http://example.com/articles/123</guid>
			<guid isPermaLink="false">com.example.articles.123</guid>
			<link>http://example.com/articles/123</link>
			<pubDate>Sat, 10 Jun 2017 00:00:00 +0000</pubDate>
			<source url="http://www.tomalak.org/links2.xml">Tomalak\'s Realm</source>
			<title>Lorem Ipsum</title>
		</item>
	</channel>
</rss>';
        $this->assertEquals($expected, $actual->__toString());
    }

    /**
     * @dataProvider protocolProvider
     */
    public function testProtocol(
        string $method,
        string $expected
    ) {
        $this->assertEquals(
            $expected,
            call_user_func([Protocol::class, $method])->__toString()
        );
    }

    public function protocolProvider(): array
    {
        return [
            ['XML_RPC', 'xml-rpc'],
            ['HTTP_POST', 'http-post'],
            ['SOAP', 'soap']
        ];
    }
}