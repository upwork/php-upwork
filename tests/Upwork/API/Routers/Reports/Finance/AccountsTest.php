<?php
namespace Upwork\API\Tests\Routers\Reports\Finance;

use Upwork\API\Tests\Routers\CommonTestRouter;

require_once __DIR__  . '/../../CommonTestRouter.php';

class AccountsTest extends CommonTestRouter
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
    public function testGetOwned()
    {
        $router = new \Upwork\API\Routers\Reports\Finance\Accounts($this->_client);
        $response = $router->getOwned('12345', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetSpecific()
    {
        $router = new \Upwork\API\Routers\Reports\Finance\Accounts($this->_client);
        $response = $router->getSpecific('12345', array());
        
        $this->_checkResponse($response);
    }
}
