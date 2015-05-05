<?php
namespace Upwork\API\Tests;

require __DIR__ . '/../../../vendor/autoload.php';

use Upwork\API\Debug as ApiDebug;
use Upwork\API\Config as ApiConfig;
use Upwork\API\Client as Client;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testNewClient()
    {
        $config = new ApiConfig(
            array(
                'consumerKey'       => 'key',
                'consumerSecret'    => 'secret'
            )
        );
        $helper = new Client($config);
        $server = $helper->getServer();

        $this->assertInstanceOf('Upwork\API\AuthTypes\OAuth1', $server);
    }

    /**
     * @test
     */
    public function testGetServer()
    {
        $config = new ApiConfig(
            array(
                'consumerKey'       => 'key',
                'consumerSecret'    => 'secret'
            )
        );
        $reflection = new \ReflectionClass('Upwork\API\Client');
        $property = $reflection->getProperty('_server');
        $property->setAccessible(true);
        $helper = new Client($config);
        $property->setValue($helper, new \StdClass);
        $server = $helper->getServer();

        $this->assertAttributeInstanceOf('StdClass', '_server', $helper);
        $this->assertInstanceOf('StdClass', $server);
    }

    /**
     * @test
     */
    public function testGetRequestToken()
    {
        $config = new ApiConfig(
            array(
                'consumerKey'       => 'key',
                'consumerSecret'    => 'secret'
            )
        );
        $reflection = new \ReflectionClass('Upwork\API\Client');
        $property = $reflection->getProperty('_server');
        $property->setAccessible(true);
        $helper = new Client($config);

        $stub = $this->getMock('StdClass', array('setupRequestToken'));
        $stub->expects($this->any())
             ->method('setupRequestToken')
             ->will($this->returnValue('testtoken'));

        $property->setValue($helper, $stub);

        $this->assertEquals('testtoken', $helper->getRequestToken());
    }

    /**
     * @test
     */
    public function testAuth()
    {
        $config = new ApiConfig(
            array(
                'consumerKey'       => 'key',
                'consumerSecret'    => 'secret'
            )
        );
        $reflection = new \ReflectionClass('Upwork\API\Client');
        $property = $reflection->getProperty('_server');
        $property->setAccessible(true);
        $helper = new Client($config);

        $stub = $this->getMock('StdClass', array('option', 'auth'));
        $stub->expects($this->any())
             ->method('option')
             ->will($this->returnValue(true));
        $stub->expects($this->any())
             ->method('auth')
             ->will($this->returnValue('response'));

        $property->setValue($helper, $stub);

        $this->assertEquals('response', $helper->auth());
    }

    /**
     * @test
     */
    public function testRequest()
    {
        $config = new ApiConfig(
            array(
                'consumerKey'       => 'key',
                'consumerSecret'    => 'secret'
            )
        );
        $reflection = new \ReflectionClass('Upwork\API\Client');
        $property = $reflection->getProperty('_server');
        $property->setAccessible(true);
        $method = $reflection->getMethod('_request');
        $method->setAccessible(true);
        $helper = new Client($config);

        $stub = $this->getMock('StdClass', array('option', 'request'));
        $stub->expects($this->any())
             ->method('option')
             ->will($this->returnValue(true));
        $stub->expects($this->any())
             ->method('request')
             ->will($this->returnValue('{"a": "b"}'));

        $property->setValue($helper, $stub);

        $response = $method->invoke($helper, 'GET', 'http://www.upwork.com/api/auth/v1/info', array());
        $this->assertInstanceOf('StdClass', $response);
        $this->assertObjectHasAttribute('a', $response);
        $this->assertInternalType('string', $response->a);
        $this->assertSame('b', $response->a);
    }

    /**
     * @test
     */
    public function testRunMethod()
    {
        $config = new ApiConfig(
            array(
                'consumerKey'       => 'key',
                'consumerSecret'    => 'secret'
            )
        );

        $stub = $this->getMock('Upwork\API\Client', array('_request'), array($config));
        $stub->expects($this->any())
             ->method('_request')
             ->will($this->returnValue('response'));

        foreach (array('get', 'post', 'put', 'delete') as $method) {
            $this->assertEquals('response', $stub->$method('http://', array()));
        }
    }
}
