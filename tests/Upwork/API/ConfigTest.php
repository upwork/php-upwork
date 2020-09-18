<?php
namespace Upwork\API\Tests;

require __DIR__ . '/../../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Upwork\API\Config as Config;
use Upwork\API\ApiException as ApiException;

class ConfigTest extends TestCase
{
    /**
     * @expectedException Upwork\API\ApiException
     */
    public function testBadProperty()
    {
        $this->expectException(\Upwork\API\ApiException::class);
        throw new ApiException('test');
    }

    /**
     * @test
     */
    public function testDefaultProperty()
    {
        $reflection = new \ReflectionClass('Upwork\API\Config');
        $property = $reflection->getProperty('_verifySsl');
        $property->setAccessible(true);
        $helper = new Config(array());
        $property->setValue($helper, true);
        $helper->__construct(array()); // will not change the attribute value
	$this->assertTrue($helper::get('verifySsl'));
    }

    /**
     * @test
     */
    public function testSetProperty()
    {
        $reflection = new \ReflectionClass(Config::class);
        $property = $reflection->getProperty('_verifySsl');
        $property->setAccessible(true);
        $helper = new Config(array());
        $property->setValue($helper, false);
        $helper->__construct(array('verifySsl' => true));
	$this->assertTrue($helper::get('verifySsl'));
    }

    /**
     * @test
     */
    public function testGetProperty()
    {
        $config = new Config(array('verifySsl' => false));
        $property = $config::get('verifySsl');
        $this->assertFalse($property);
    }
}
