<?php
namespace Upwork\API\Tests\Routers\Activities;

use Upwork\API\Tests\Routers\CommonTestRouter;

require_once __DIR__  . '/../CommonTestRouter.php';

class EngagementTest extends CommonTestRouter
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
    public function testGetSpecific()
    {
        $router = new \Upwork\API\Routers\Activities\Engagement($this->_client);
        $response = $router->getSpecific('1234');
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testAssign()
    {
        $router = new \Upwork\API\Routers\Activities\Engagement($this->_client);
        $response = $router->assign('company', 'team', '1234', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testAssignToEngagement()
    {
        $router = new \Upwork\API\Routers\Activities\Engagement($this->_client);
        $response = $router->assignToEngagement('1234', array());
        
        $this->_checkResponse($response);
    }
}
