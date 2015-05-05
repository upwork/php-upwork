<?php
/**
 * Upwork auth library for using with public API by OAuth
 * Teams info
 *
 * @final
 * @package     UpworkAPI
 * @since       05/16/2014
 * @copyright   Copyright 2014(c) Upwork.com
 * @author      Maksym Novozhylov <mnovozhilov@upwork.com>
 * @license     Upwork's API Terms of Use {@link https://developers.upwork.com/api-tos.html}
 */

namespace Upwork\API\Routers\Organization;

use Upwork\API\Debug as ApiDebug;
use Upwork\API\Client as ApiClient;

/**
 * Teams info
 *
 * @link http://developers.upwork.com/Organization-APIs
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
     * Get Teams info
     *
     * @return object
     */
    public function getList()
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/hr/v2/teams');
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Get Users in Team
     *
     * @param   integer $teamReference Team reference
     * @return  object
     */
    public function getUsersInTeam($teamReference)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/hr/v2/teams/' . $teamReference . '/users');
        ApiDebug::p('found response info', $response);

        return $response;
    }
}
