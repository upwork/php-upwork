<?php
namespace Upwork\API\Tests\Routers;

require __DIR__ . '/../../../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Upwork\API\Debug as ApiDebug;
use Upwork\API\Config as ApiConfig;

class CommonTestRouter extends TestCase
{
    /** @var Client mock */
    protected $_client;

    /**
     * Setup
     */
    protected function setUp(): void
    {
        $config = new ApiConfig(
            array(
                'consumerKey'       => 'key',
                'consumerSecret'    => 'secret'
            )
        );

        $result = new \StdClass;
        $result->server_time = '1111111111';
        $result->auth_user = [];
        $result->body = 1;
        
	$stub = $this->getMockBuilder(\Upwork\API\Client::class)
                     ->enableArgumentCloning()
                     ->setConstructorArgs([$config])
                     ->getMock();
        $stub->expects($this->any())
             ->method('get')
	     ->will($this->returnValue($result));
        $stub->expects($this->any())
             ->method('post')
	     ->will($this->returnValue($result));
        $stub->expects($this->any())
             ->method('put')
	     ->will($this->returnValue($result));
        $stub->expects($this->any())
             ->method('delete')
	     ->will($this->returnValue($result));

        $this->_client = $stub;
    }

    /**
     * Check tested response
     *
     * @param   object $response Response from mocked client instance
     */
    protected function _checkResponse($response)
    {
        $this->assertInstanceOf('StdClass', $response);
        $this->assertObjectHasAttribute('server_time', $response);
        $this->assertObjectHasAttribute('auth_user', $response);
        $this->assertObjectHasAttribute('body', $response);
        $this->assertIsString($response->server_time);
        $this->assertIsArray($response->auth_user);
        $this->assertIsInt($response->body);
        $this->assertSame('1111111111', $response->server_time);
        $this->assertSame(1, $response->body);
    }
}
