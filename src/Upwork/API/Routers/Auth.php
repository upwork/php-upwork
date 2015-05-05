<?php
/**
 * Upwork auth library for using with public API by OAuth
 * My Info
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
 * My Info
 *
 * @link http://developers.upwork.com/My%20Info
 */
final class Auth extends ApiClient
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
     * My Info
     *
     * @return object
     */
    public function getUserInfo()
    {
        ApiDebug::p(__FUNCTION__);

        $info = $this->_client->get('/auth/v1/info');
        ApiDebug::p('found auth info', $info);

        return $info;
    }
}
