<?php
namespace Upwork\API\Tests\Routers\Reports\Finance;

use Upwork\API\Tests\Routers\CommonTestRouter;

require_once __DIR__  . '/../../CommonTestRouter.php';

class EarningsTest extends CommonTestRouter
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
    public function testGetByFreelancer()
    {
        $router = new \Upwork\API\Routers\Reports\Finance\Earnings($this->_client);
        $response = $router->getByFreelancer('12345', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetByFreelancersTeam()
    {
        $router = new \Upwork\API\Routers\Reports\Finance\Earnings($this->_client);
        $response = $router->getByFreelancersTeam('12345', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetByFreelancersCompany()
    {
        $router = new \Upwork\API\Routers\Reports\Finance\Earnings($this->_client);
        $response = $router->getByFreelancersCompany('12345', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetByBuyersTeam()
    {
        $router = new \Upwork\API\Routers\Reports\Finance\Earnings($this->_client);
        $response = $router->getByBuyersTeam('12345', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetByBuyersCompany()
    {
        $router = new \Upwork\API\Routers\Reports\Finance\Earnings($this->_client);
        $response = $router->getByBuyersCompany('12345', array());
        
        $this->_checkResponse($response);
    }
}
