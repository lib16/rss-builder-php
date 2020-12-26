<?php
namespace Lib16\RSS\Enums;

use Lib16\Utils\Enums\Enum;

class Protocol extends Enum
{
    public static function HTTP_POST(): self
    {
        return new static('http-post');
    }

    public static function SOAP(): self
    {
        return new static('soap');
    }

    public static function XML_RPC(): self
    {
        return new static('xml-rpc');
    }
}