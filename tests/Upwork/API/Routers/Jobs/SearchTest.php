<?php
namespace Upwork\API\Tests\Routers\Jobs;

use Upwork\API\Tests\Routers\CommonTestRouter;

require_once __DIR__  . '/../CommonTestRouter.php';

class SearchTest extends CommonTestRouter
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
    public function testFind()
    {
        $router = new \Upwork\API\Routers\Jobs\Search($this->_client);
        $response = $router->find(array());
        
        $this->_checkResponse($response);
    }
}
