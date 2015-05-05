<?php
namespace Upwork\API\Tests\Routers\Organization;

use Upwork\API\Tests\Routers\CommonTestRouter;

require_once __DIR__  . '/../CommonTestRouter.php';

class UsersTest extends CommonTestRouter
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
    public function testGetMyInfo()
    {
        $router = new \Upwork\API\Routers\Organization\Users($this->_client);
        $response = $router->getMyInfo();
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testSpecific()
    {
        $router = new \Upwork\API\Routers\Organization\Users($this->_client);
        $response = $router->getSpecific('1234');
        
        $this->_checkResponse($response);
    }
}
