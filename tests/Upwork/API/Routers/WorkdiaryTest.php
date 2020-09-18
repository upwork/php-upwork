<?php
namespace Upwork\API\Tests\Routers;

require_once __DIR__  . '/CommonTestRouter.php';

class WorkdiaryTest extends CommonTestRouter
{
    /**
     * Setup
     */
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @test
     */
    public function testGetByCompany()
    {
        $router = new \Upwork\API\Routers\Workdiary($this->_client);
        $response = $router->getByCompany('company', '20140101', array());
        
        $this->_checkResponse($response);
    }

    /** 
     * @test
     */
    public function testGetByContract()
    {   
        $router = new \Upwork\API\Routers\Workdiary($this->_client);
        $response = $router->getByContract('1234', '20140101', array());
    
        $this->_checkResponse($response);
    }
}
