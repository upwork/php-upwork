<?php
namespace Upwork\API\Tests\Routers\Hr;

use Upwork\API\Tests\Routers\CommonTestRouter;

require_once __DIR__  . '/../CommonTestRouter.php';

class MilestonesTest extends CommonTestRouter
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
    public function testGetActiveMilestone()
    {
        $router = new \Upwork\API\Routers\Hr\Milestones($this->_client);
        $response = $router->getActiveMilestone(1234);
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetSubmissions()
    {
        $router = new \Upwork\API\Routers\Hr\Milestones($this->_client);
        $response = $router->getSubmissions(1234);
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testCreate()
    {
        $router = new \Upwork\API\Routers\Hr\Milestones($this->_client);
        $response = $router->create(array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testEdit()
    {
        $router = new \Upwork\API\Routers\Hr\Milestones($this->_client);
        $response = $router->edit('1234', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testActivate()
    {
        $router = new \Upwork\API\Routers\Hr\Milestones($this->_client);
        $response = $router->activate('1234', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testApprove()
    {
        $router = new \Upwork\API\Routers\Hr\Milestones($this->_client);
        $response = $router->approve(array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testDelete()
    {
        $router = new \Upwork\API\Routers\Hr\Milestones($this->_client);
        $response = $router->delete(array());
        
        $this->_checkResponse($response);
    }
}
