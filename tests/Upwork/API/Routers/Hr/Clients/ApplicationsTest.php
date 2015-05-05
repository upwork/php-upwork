<?php
namespace Upwork\API\Tests\Routers\Hr\Clients;

use Upwork\API\Tests\Routers\CommonTestRouter;

require_once __DIR__  . '/../../CommonTestRouter.php';

class ApplicationsTest extends CommonTestRouter
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
    public function testGetList()
    {
        $router = new \Upwork\API\Routers\Hr\Clients\Applications($this->_client);
        $response = $router->getList(array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetSpecific()
    {
        $router = new \Upwork\API\Routers\Hr\Clients\Applications($this->_client);
        $response = $router->getSpecific('12345', array());
        
        $this->_checkResponse($response);
    }
}
