<?php
namespace Upwork\API\Tests\Routers\Hr;

use Upwork\API\Tests\Routers\CommonTestRouter;

require_once __DIR__  . '/../CommonTestRouter.php';

class SubmissionsTest extends CommonTestRouter
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
    public function testRequestApproval()
    {
        $router = new \Upwork\API\Routers\Hr\Submissions($this->_client);
        $response = $router->requestApproval(array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testApprove()
    {
        $router = new \Upwork\API\Routers\Hr\Submissions($this->_client);
        $response = $router->approve('1234', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testReject()
    {
        $router = new \Upwork\API\Routers\Hr\Submissions($this->_client);
        $response = $router->reject('1234', array());
        
        $this->_checkResponse($response);
    }
}
