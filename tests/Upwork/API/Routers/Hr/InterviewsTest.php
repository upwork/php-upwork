<?php
namespace Upwork\API\Tests\Routers\Hr;

use Upwork\API\Tests\Routers\CommonTestRouter;

require_once __DIR__  . '/../CommonTestRouter.php';

class InterviewsTest extends CommonTestRouter
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
    public function testInvite()
    {
        $router = new \Upwork\API\Routers\Hr\Interviews($this->_client);
        $response = $router->invite('~jobkey', array());
        
        $this->_checkResponse($response);
    }
}
