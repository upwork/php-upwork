<?php
namespace Upwork\API\Tests\Routers;

require_once __DIR__  . '/CommonTestRouter.php';

class PaymentsTest extends CommonTestRouter
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
    public function testSubmitBonus()
    {
        $router = new \Upwork\API\Routers\Payments($this->_client);
        $response = $router->submitBonus('12345', array());
        
        $this->_checkResponse($response);
    }
}
