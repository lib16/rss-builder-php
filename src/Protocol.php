<?php
namespace Lib16\RSS;

use MyCLabs\Enum\Enum;

class Protocol extends Enum
{

    const HTTP_POST = 'http-post';

    const SOAP = 'soap';

    const XML_RPC = 'xml-rpc';
}