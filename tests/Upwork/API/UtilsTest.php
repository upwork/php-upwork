<?php
require __DIR__ . '/../../../vendor/autoload.php';

use Upwork\API\Config as Apiconfig;
use Upwork\API\Debug as ApiDebug;
use Upwork\API\Utils as Utils;

class UtilsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testGetFullUrl()
    {
        $url = Utils::getFullUrl('/auth/v1/oauth/token/access', 'api');
        $this->assertEquals('https://www.upwork.com/api/auth/v1/oauth/token/access', $url);
    }
}
