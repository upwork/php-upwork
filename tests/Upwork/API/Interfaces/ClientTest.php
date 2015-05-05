<?php
namespace Upwork\API\Tests\Interfaces;

require __DIR__ . '/../../../../vendor/autoload.php';

class InterfaceClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testCommon()
    {
        $reflection = new \ReflectionClass('Upwork\API\Interfaces\Client');
        $this->assertTrue($reflection->isInterface());
        $this->assertTrue($reflection->hasMethod('auth'));
        $this->assertTrue($reflection->hasMethod('request'));
        $this->assertTrue($reflection->hasMethod('setupRequestToken'));
    }
}
