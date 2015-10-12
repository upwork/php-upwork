<?php
namespace Upwork\API\Tests\Routers;

require_once __DIR__  . '/CommonTestRouter.php';

class MetadataTest extends CommonTestRouter
{
    /**
     * Setup
     */
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * @test
     */
    public function testGetCategoriesV2()
    {
        $router = new \Upwork\API\Routers\Metadata($this->_client);
        $response = $router->getCategoriesV2();
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetSkills()
    {
        $router = new \Upwork\API\Routers\Metadata($this->_client);
        $response = $router->getSkills();
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetRegions()
    {
        $router = new \Upwork\API\Routers\Metadata($this->_client);
        $response = $router->getRegions();
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetTests()
    {
        $router = new \Upwork\API\Routers\Metadata($this->_client);
        $response = $router->getTests();
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetReasons()
    {
        $router = new \Upwork\API\Routers\Metadata($this->_client);
        $response = $router->getReasons(array());
        
        $this->_checkResponse($response);
    }
}
