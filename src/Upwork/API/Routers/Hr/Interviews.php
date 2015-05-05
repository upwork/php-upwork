<?php
/**
 * Upwork auth library for using with public API by OAuth
 * Invite to Interview
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
 * Invite to Interview
 *
 * @link http://developers.upwork.com/w/page/23873221/Jobs%20HR%20API
 */
final class Interviews extends ApiClient
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
     * Invite to Interview
     *
     * @param   string $jobKey Job key
     * @param   array $params Parameters
     * @return  object
     */
    public function invite($jobKey, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->post('/hr/v1/jobs/' . $jobKey . '/candidates', $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }
}
