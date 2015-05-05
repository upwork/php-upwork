<?php
/**
 * Upwork auth library for using with public API by OAuth
 * Workdiary API
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
 * Workdiary API
 *
 * @link http://developers.upwork.com/Work-Diary
 */
final class Workdiary extends ApiClient
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
     * Get Workdiary
     *
     * @param   string $company Company ID
     * @param   string $username User ID
     * @param   string $date Date
     * @param   array $params (Optional) Parameters
     * @return  object
     */
    public function get($company, $username, $date, $params = array())
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/team/v1/workdiaries/' . $company . '/' . $username . '/' . $date, $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Get Workdiary by Contract
     *
     * @param   string $contract Contract ID
     * @param   string $date Date
     * @param   array $params (Optional) Parameters
     * @return  object
     */
    public function getByContract($contract, $date, $params = array())
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/team/v2/workdiaries/contracts/' . $contract . '/' . $date, $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }
}
