<?php
/**
 * Upwork auth library for using with public API by OAuth
 * Get users info
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
 * Get user info
 *
 * @link http://developers.upwork.com/Organization-APIs
 */
final class Users extends ApiClient
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
     * Get Auth User Info
     *
     * @return object
     */
    public function getMyInfo()
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/hr/v2/users/me');
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Get Specific User Info
     *
     * @param integer $userReference User Reference
     * @return object
     */
    public function getSpecific($userReference)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/hr/v2/users/' . $userReference);
        ApiDebug::p('found response info', $response);

        return $response;
    }
}
