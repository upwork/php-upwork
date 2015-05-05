<?php
namespace Upwork\API\Tests\Routers;

require_once __DIR__  . '/CommonTestRouter.php';

class McTest extends CommonTestRouter
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
    public function testGetTrays()
    {
        $router = new \Upwork\API\Routers\Mc($this->_client);
        $response = $router->getTrays();
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetTrayByType()
    {
        $router = new \Upwork\API\Routers\Mc($this->_client);
        $response = $router->getTrayByType('username', 'inbox');
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetThreadDetails()
    {
        $router = new \Upwork\API\Routers\Mc($this->_client);
        $response = $router->getThreadDetails('username', 12345);
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetThreadByContext()
    {
        $router = new \Upwork\API\Routers\Mc($this->_client);
        $response = $router->getThreadByContext('username', '~key', 12345);
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetThreadByContextLastPosts()
    {
        $router = new \Upwork\API\Routers\Mc($this->_client);
        $response = $router->getThreadByContextLastPosts('username', '~key', 12345);
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testMarkThread()
    {
        $router = new \Upwork\API\Routers\Mc($this->_client);
        $response = $router->markThread('username', 12345, array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testStartNewThread()
    {
        $router = new \Upwork\API\Routers\Mc($this->_client);
        $response = $router->startNewThread('username', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testReplyToThread()
    {
        $router = new \Upwork\API\Routers\Mc($this->_client);
        $response = $router->replyToThread('username', 12345, array());
        
        $this->_checkResponse($response);
    }
}
