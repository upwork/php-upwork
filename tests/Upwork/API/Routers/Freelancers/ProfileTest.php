<?php
namespace Upwork\API\Tests\Routers\Freelancers;

use Upwork\API\Tests\Routers\CommonTestRouter;

require_once __DIR__  . '/../CommonTestRouter.php';

class FreelancersTest extends CommonTestRouter
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
        $router = new \Upwork\API\Routers\Freelancers\Profile($this->_client);
        $response = $router->getSpecific('~profilekey');
        
        $this->_checkResponse($response);
    }
}
