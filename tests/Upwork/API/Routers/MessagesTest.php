<?php
namespace Upwork\API\Tests\Routers;

require_once __DIR__  . '/CommonTestRouter.php';

class MessagesTest extends CommonTestRouter
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
    public function testGetRooms()
    {
        $router = new \Upwork\API\Routers\Messages($this->_client);
        $response = $router->getRooms();
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetRoomDetails()
    {
        $router = new \Upwork\API\Routers\Messages($this->_client);
        $response = $router->getRoomDetails('company', 'room-id', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetRoomByOffer()
    {
        $router = new \Upwork\API\Routers\Messages($this->_client);
        $response = $router->getRoomByOffer('company', '1234', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetRoomByApplication()
    {
        $router = new \Upwork\API\Routers\Messages($this->_client);
        $response = $router->getRoomByApplication('company', '1234', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetRoomByContract()
    {
        $router = new \Upwork\API\Routers\Messages($this->_client);
        $response = $router->getRoomByContract('company', '1234', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testCreateRoom()
    {
        $router = new \Upwork\API\Routers\Messages($this->_client);
        $response = $router->createRoom('company', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testSendMesageToRoom()
    {
        $router = new \Upwork\API\Routers\Messages($this->_client);
        $response = $router->sendMessageToRoom('company', 'room-id', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testUpdateRoomSettings()
    {
        $router = new \Upwork\API\Routers\Messages($this->_client);
        $response = $router->updateRoomSettings('company', 'room-id', 'username', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testUpdateRoomMetadata()
    {
        $router = new \Upwork\API\Routers\Messages($this->_client);
        $response = $router->updateRoomMetadata('company', 'room-id', array());
        
        $this->_checkResponse($response);
    }
}
