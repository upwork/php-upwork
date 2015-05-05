<?php
/**
 * Upwork auth library for using with public API by OAuth
 * Search Freelancers
 *
 * @final
 * @package     UpworkAPI
 * @since       05/16/2014
 * @copyright   Copyright 2014(c) Upwork.com
 * @author      Maksym Novozhylov <mnovozhilov@upwork.com>
 * @license     Upwork's API Terms of Use {@link https://developers.upwork.com/api-tos.html}
 */

namespace Upwork\API\Routers\Freelancers;

use Upwork\API\Debug as ApiDebug;
use Upwork\API\Client as ApiClient;

/**
 * Search Freelancers
 *
 * @link http://developers.upwork.com/search-providers
 */
final class Search extends ApiClient
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
     * Search freelancers
     *
     * @param   array $params (Optional) Parameters
     * @return  object
     */
    public function find($params = array())
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/profiles/v2/search/providers', $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }
}
