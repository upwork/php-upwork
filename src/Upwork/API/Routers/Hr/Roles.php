<?php
/**
 * Upwork auth library for using with public API by OAuth
 * User Roles
 *
 * @final
 * @package     UpworkAPI
 * @since       05/09/2014
 * @copyright   Copyright 2014(c) Upwork.com
 * @author      Maksym Novozhylov <mnovozhilov@upwork.com>
 * @license     Upwork's API Terms of Use {@link https://developers.upwork.com/api-tos.html}
 */

namespace Upwork\API\Routers\Hr;

use Upwork\API\Debug as ApiDebug;
use Upwork\API\Client as ApiClient;

/**
 * User Roles
 *
 * @link http://developers.upwork.com/User-Roles
 */
final class Roles extends ApiClient
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
     * Get user roles
     *
     * @return object
     */
    public function getAll()
    {
        ApiDebug::p(__FUNCTION__);

        $roles = $this->_client->get('/hr/v2/userroles');
        ApiDebug::p('found response info', $roles);

        return $roles;
    }

    /**
     * Get by specific user
     *
     * @param   integer $reference User reference
     * @return  object
     */
    public function getBySpecificUser($reference)
    {
        ApiDebug::p(__FUNCTION__);

        $roles = $this->_client->get('/hr/v2/userroles/' . $reference);
        ApiDebug::p('found auth info', $roles);

        return $roles;
    }
}
