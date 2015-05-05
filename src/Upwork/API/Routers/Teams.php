<?php
/**
 * Upwork auth library for using with public API by OAuth
 * Team API
 *
 * @final
 * @package     UpworkAPI
 * @since       05/19/2014
 * @copyright   Copyright 2014(c) Upwork.com
 * @author      Maksym Novozhylov <mnovozhilov@upwork.com>
 * @license     Upwork's API Terms of Use {@link https://developers.upwork.com/api-tos.html}
 */

namespace Upwork\API\Routers;

use Upwork\API\Debug as ApiDebug;
use Upwork\API\Client as ApiClient;

/**
 * Team API
 *
 * @link http://developers.upwork.com/Team-API
 */
final class Teams extends ApiClient
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
     * Get Team Rooms
     *
     * @return  object
     */
    public function getList()
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/team/v2/teamrooms');
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Get specific team or company
     *
     * @param   string $team Teamroom or company ID
     * @param   array $params (Optional) Parameters
     * @return  object
     */
    public function getSpecific($team, $params = array())
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/team/v2/teamrooms/' . $team, $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }
}
