<?php
namespace Upwork\API\Tests\Routers;

require __DIR__ . '/../../../../vendor/autoload.php';

use Upwork\API\Debug as ApiDebug;
use Upwork\API\Config as ApiConfig;

class CommonTestRouter extends \PHPUnit_Framework_TestCase
{
    /** @var Client mock */
    protected $_client;

    /**
     * Setup
     */
    public function setUp()
    {
        $config = new ApiConfig(
            array(
                'consumerKey'       => 'key',
                'consumerSecret'    => 'secret'
            )
        );

        $result = new \StdClass;
        $result->server_time = '1111111111';
        $result->auth_user = array();
        $result->body = 1;
        
        $stub = $this->getMock('Upwork\API\Client', array('_request'), array($config));
        $stub->expects($this->any())
             ->method('_request')
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
        $this->assertInternalType('string', $response->server_time);
        $this->assertInternalType('array', $response->auth_user);
        $this->assertInternalType('integer', $response->body);
        $this->assertSame('1111111111', $response->server_time);
        $this->assertSame(1, $response->body);
    }
}
