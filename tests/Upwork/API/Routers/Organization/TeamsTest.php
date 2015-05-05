<?php
namespace Upwork\API\Tests\Routers\Organization;

use Upwork\API\Tests\Routers\CommonTestRouter;

require_once __DIR__  . '/../CommonTestRouter.php';

class TeamsTest extends CommonTestRouter
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
    public function testList()
    {
        $router = new \Upwork\API\Routers\Organization\Teams($this->_client);
        $response = $router->getList();
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetUsersInTeam()
    {
        $router = new \Upwork\API\Routers\Organization\Teams($this->_client);
        $response = $router->getUsersInTeam('12345');
        
        $this->_checkResponse($response);
    }
}
