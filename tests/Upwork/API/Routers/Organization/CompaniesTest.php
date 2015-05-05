<?php
namespace Upwork\API\Tests\Routers\Organization;

use Upwork\API\Tests\Routers\CommonTestRouter;

require_once __DIR__  . '/../CommonTestRouter.php';

class CompaniesTest extends CommonTestRouter
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
        $router = new \Upwork\API\Routers\Organization\Companies($this->_client);
        $response = $router->getList();
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetSpecific()
    {
        $router = new \Upwork\API\Routers\Organization\Companies($this->_client);
        $response = $router->getSpecific('12345');
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetTeams()
    {
        $router = new \Upwork\API\Routers\Organization\Companies($this->_client);
        $response = $router->getTeams('12345');
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testUsers()
    {
        $router = new \Upwork\API\Routers\Organization\Companies($this->_client);
        $response = $router->getUsers('12345');
        
        $this->_checkResponse($response);
    }
}
