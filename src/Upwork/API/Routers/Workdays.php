<?php
/**
 * Upwork auth library for using with public API by OAuth
 * Workdays API
 *
 * @final
 * @package     UpworkAPI
 * @since       07/14/2015
 * @copyright   Copyright 2015(c) Upwork.com
 * @author      Maksym Novozhylov <mnovozhilov@upwork.com>
 * @license     Upwork's API Terms of Use {@link https://developers.upwork.com/api-tos.html}
 */

namespace Upwork\API\Routers;

use Upwork\API\Debug as ApiDebug;
use Upwork\API\Client as ApiClient;

/**
 * Workdays API
 *
 * @link http://developers.upwork.com/#companies-and-teams_get-workdays-by-company
 */
final class Workdays extends ApiClient
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
     * Get Workdays
     *
     * @param   string $company Company ID
     * @param   string $fromDate Start date
     * @param   string $tillDate Till date
     * @param   array $params (Optional) Parameters
     * @return  object
     */
    public function getByCompany($company, $fromDate, $tillDate, $params = array())
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/team/v2/workdays/companies/' . $company . '/' . $fromDate . ',' . $tillDate, $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Get Workdiary by Contract
     *
     * @param   string $contract Contract ID
     * @param   string $fromDate Start date
     * @param   string $tillDate Till date
     * @param   array $params (Optional) Parameters
     * @return  object
     */
    public function getByContract($contract, $fromDate, $tillDate, $params = array())
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/team/v2/workdays/contracts/' . $company . '/' . $fromDate . ',' . $tillDate, $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }
}
