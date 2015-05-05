<?php
/**
 * Upwork auth library for using with public API by OAuth
 *
 * @final
 * @package     UpworkAPI
 * @since       04/21/2014
 * @copyright   Copyright 2014(c) Upwork.com
 * @author      Maksym Novozhylov <mnovozhilov@upwork.com>
 * @license     Upwork's API Terms of Use {@link https://developers.upwork.com/api-tos.html}
 */

namespace Upwork\API\Routers;

use Upwork\API\Debug as ApiDebug;
use Upwork\API\Client as ApiClient;

/**
 * Message Center
 *
 * @link http://developers.upwork.com/Message-Center-API
 */
final class Mc extends ApiClient
{
    const ENTRY_POINT = UPWORK_API_EP_NAME;

    /**
     * @var Client instance
     */
    private $_client;

    /**
     * Constructor
     *
     * @param   ApiClient $client Client object
     */
    public function __construct(ApiClient $client)
    {
        ApiDebug::p('init ' . __CLASS__ . ' router');
        $this->_client = $client;
        parent::$_epoint = self::ENTRY_POINT;
    }

    /**
     * Get trays
     *
     * @access  public
     * @return  object
     */
    public function getTrays()
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/mc/v1/trays');
        ApiDebug::p('found trays', $response);

        return $response;
    }

    /**
     * Get tray by type
     *
     * @param   string $username Username
     * @param   string $type Tray type/name
     * @access  public
     * @return  object
     */
    public function getTrayByType($username, $type)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/mc/v1/trays/' . $username . '/' . $type);
        ApiDebug::p('found tray', $response);

        return $response;
    }

    /**
     * List thread details based on thread id
     *
     * @param   string $username Username
     * @param   integer $threadId Thread ID
     * @access  public
     * @return  object
     */
    public function getThreadDetails($username, $threadId)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/mc/v1/threads/' . $username . '/' . $threadId);
        ApiDebug::p('found thread', $response);

        return $response;
    }

    /**
     * Get a specific thread by context
     *
     * @param   string $username Username
     * @param   string $jobKey Job key
     * @param   integer $applicationId Application ID
     * @param   string $context (Optional) Context
     * @access  public
     * @return  object
     */
    public function getThreadByContext($username, $jobKey, $applicationId, $context = 'Interviews')
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/mc/v1/contexts/' . $username . '/' . $context . ':' . $jobKey . ':' . $applicationId);
        ApiDebug::p('found thread', $response);

        return $response;
    }


    /**
     * Get a specific thread by context (last message content)
     *
     * @param   string $username Username
     * @param   string $jobKey Job key
     * @param   integer $applicationId Application ID
     * @param   string $context (Optional) Context
     * @access  public
     * @return  object
     */
    public function getThreadByContextLastPosts($username, $jobKey, $applicationId, $context = 'Interviews')
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/mc/v1/contexts/' . $username . '/' . $context . ':' . $jobKey . ':' . $applicationId . '/last_posts');
        ApiDebug::p('found thread', $response);

        return $response;
    }

    /**
     * Update threads based on user actions
     *
     * @param   string $username Username
     * @param   integer $threadId Thread ID
     * @param   array $params Parameters
     * @access  public
     * @return  object
     */
    public function markThread($username, $threadId, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->put('/mc/v1/threads/' . $username . '/' . $threadId, $params);
        ApiDebug::p('found response', $response);

        return $response;
    }

    /**
     * Send new message
     *
     * @param   string $username User ID
     * @param   array $params Parameters
     * @access  public
     * @return  object
     */
    public function startNewThread($username, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->post('/mc/v1/threads/' . $username, $params);
        ApiDebug::p('found response', $response);

        return $response;
    }

    /**
     * Reply to existend thread
     *
     * @param   string $username User ID
     * @param   integer $threadId Thread ID
     * @param   array $params Parameters
     * @access  public
     * @return  object
     */
    public function replyToThread($username, $threadId, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->post('/mc/v1/threads/' . $username . '/' . $threadId, $params);
        ApiDebug::p('found response', $response);
        
        return $response;
    }
}
