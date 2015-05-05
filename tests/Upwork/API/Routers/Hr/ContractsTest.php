<?php
namespace Upwork\API\Tests\Routers\Hr;

use Upwork\API\Tests\Routers\CommonTestRouter;

require_once __DIR__  . '/../CommonTestRouter.php';

class ContractsTest extends CommonTestRouter
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
    public function testSuspendContract()
    {
        $router = new \Upwork\API\Routers\Hr\Contracts($this->_client);
        $response = $router->suspendContract('11111', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testRestartContract()
    {
        $router = new \Upwork\API\Routers\Hr\Contracts($this->_client);
        $response = $router->restartContract('11111', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testEndContract()
    {
        $router = new \Upwork\API\Routers\Hr\Contracts($this->_client);
        $response = $router->endContract('11111', array());
        
        $this->_checkResponse($response);
    }
}
