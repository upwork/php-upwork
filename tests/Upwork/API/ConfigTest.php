<?php
namespace Upwork\API\Tests;

require __DIR__ . '/../../../vendor/autoload.php';

use Upwork\API\Config as Config;
use Upwork\API\ApiException as ApiException;

class ConfigTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException Upwork\API\ApiException
     */
    public function testBadProperty()
    {
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
        $this->assertAttributeEquals(true, '_verifySsl', $helper);
    }

    /**
     * @test
     */
    public function testSetProperty()
    {
        $reflection = new \ReflectionClass('Upwork\API\Config');
        $property = $reflection->getProperty('_verifySsl');
        $property->setAccessible(true);
        $helper = new Config(array());
        $property->setValue($helper, false);
        $helper->__construct(array('verifySsl' => true));
        $this->assertAttributeEquals(true, '_verifySsl', $helper);
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
