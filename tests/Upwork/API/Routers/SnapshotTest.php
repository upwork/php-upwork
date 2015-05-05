<?php
namespace Upwork\API\Tests\Routers;

require_once __DIR__  . '/CommonTestRouter.php';

class SnapshotTest extends CommonTestRouter
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
    public function testGet()
    {
        $router = new \Upwork\API\Routers\Snapshot($this->_client);
        $response = $router->get('company', 'username', '1234567890');
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testUpdate()
    {
        $router = new \Upwork\API\Routers\Snapshot($this->_client);
        $response = $router->update('company', 'username', '1234567890', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testDelete()
    {
        $router = new \Upwork\API\Routers\Snapshot($this->_client);
        $response = $router->delete('company', 'username', '1234567890');
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetByContract()
    {
        $router = new \Upwork\API\Routers\Snapshot($this->_client);
        $response = $router->getByContract('1234', '1234567890');
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testUpdateByContract()
    {
        $router = new \Upwork\API\Routers\Snapshot($this->_client);
        $response = $router->updateByContract('1234', '1234567890', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testDeleteByContract()
    {
        $router = new \Upwork\API\Routers\Snapshot($this->_client);
        $response = $router->deleteByContract('1234', '1234567890');
        
        $this->_checkResponse($response);
    }
}
