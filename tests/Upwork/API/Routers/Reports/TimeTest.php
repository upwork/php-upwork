<?php
namespace Upwork\API\Tests\Routers\Reports;

use Upwork\API\Tests\Routers\CommonTestRouter;

require_once __DIR__  . '/../CommonTestRouter.php';

class TimeTest extends CommonTestRouter
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
    public function testGetByTeamFull()
    {
        $router = new \Upwork\API\Routers\Reports\Time($this->_client);
        $response = $router->getByTeamFull('company', 'team', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetByTeamLimited()
    {
        $router = new \Upwork\API\Routers\Reports\Time($this->_client);
        $response = $router->getByTeamLimited('company', 'team', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetByAgency()
    {
        $router = new \Upwork\API\Routers\Reports\Time($this->_client);
        $response = $router->getByAgency('company', 'agency', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetByCompany()
    {
        $router = new \Upwork\API\Routers\Reports\Time($this->_client);
        $response = $router->getByCompany('company', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetByFreelancerLimited()
    {
        $router = new \Upwork\API\Routers\Reports\Time($this->_client);
        $response = $router->getByFreelancerLimited('provider', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetByFreelancerFull()
    {
        $router = new \Upwork\API\Routers\Reports\Time($this->_client);
        $response = $router->getByFreelancerFull('provider', array());
        
        $this->_checkResponse($response);
    }
}
