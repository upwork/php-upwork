<?php
namespace Upwork\API\Tests\AuthTypes;

require __DIR__ . '/../../../../vendor/autoload.php';

use Upwork\API\AuthTypes\AbstractOAuth as AbstractOAuth;

class AbstractOAuthTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testSetOption()
    {
        $stub = $this->getMockForAbstractClass(
            'Upwork\API\AuthTypes\AbstractOAuth',
            array('key', 'secret')
        );

        $reflection = new \ReflectionClass($stub);
        $property = $reflection->getProperty('_sigMethod');
        $property->setAccessible(true);
        $before = $property->getValue($property);
        
        $stub->option('sigMethod', 'MD5');
        $after = $property->getValue('sigMethod');

        $this->assertEquals('HMAC-SHA1', $before);
        $this->assertEquals('MD5', $after);
    }

    /**
     * @test
     */
    public function testAuth()
    {
        $stub = $this->getMockForAbstractClass(
            'Upwork\API\AuthTypes\AbstractOAuth',
            array('key', 'secret')
        );
        
        $reflection = new \ReflectionClass($stub);
        $property = $reflection->getProperty('_verifier');
        $property->setAccessible(true);
        $property->setValue('verifier');

        $property = $reflection->getProperty('_accessToken');
        $property->setAccessible(true);
        $property->setValue('accesstoken');
        $property = $reflection->getProperty('_accessSecret');
        $property->setAccessible(true);
        $property->setValue('accesssecret');
        
        $response = $stub->auth();
        $this->assertArrayHasKey('access_token', $response);
        $this->assertArrayHasKey('access_secret', $response);
        $this->assertEquals('accesstoken', $response['access_token']);
        $this->assertEquals('accesssecret', $response['access_secret']);
    }

    /**
     * @test
     */
    public function testGetOAuthInstance()
    {
        $stub = $this->getMockForAbstractClass(
            'Upwork\API\AuthTypes\AbstractOAuth',
            array('key', 'secret')
        );
        $stub->expects($this->any())
             ->method('_getOAuthInstance')
             ->will($this->returnValue(true));

        $reflection = new \ReflectionClass($stub);
        $method = $reflection->getMethod('_getOAuthInstance');
        $method->setAccessible(true);

        $this->assertTrue($method->invoke($stub, array()));
    }

    /**
     * @test
     */
    public function testSetupAccessToken()
    {
        $stub = $this->getMockForAbstractClass(
            'Upwork\API\AuthTypes\AbstractOAuth',
            array('key', 'secret')
        );
        $stub->expects($this->any())
             ->method('_setupAccessToken')
             ->will($this->returnValue(true));

        $reflection = new \ReflectionClass($stub);
        $method = $reflection->getMethod('_setupAccessToken');
        $method->setAccessible(true);

        $this->assertTrue($method->invoke($stub, array()));
    }

    /**
     * @test
     * @expectedException Upwork\API\ApiException
     */
    public function testNoKeySpecified()
    {
        $stub = $this->getMockForAbstractClass(
            'Upwork\API\AuthTypes\AbstractOAuth',
            array(null, 'secret')
        );
        $stub->expects($this->any())
             ->method('_construct')
             ->will($this->returnValue(true));
    }

    /**
     * @test
     * @expectedException Upwork\API\ApiException
     */
    public function testNoSecretSpecified()
    {
        $stub = $this->getMockForAbstractClass(
            'Upwork\API\AuthTypes\AbstractOAuth',
            array('key', null)
        );
        $stub->expects($this->any())
             ->method('_construct')
             ->will($this->returnValue(true));
    }
}
