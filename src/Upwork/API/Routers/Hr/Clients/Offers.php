<?php
/**
 * Upwork auth library for using with public API by OAuth
 * Client's Offers
 *
 * @final
 * @package     UpworkAPI
 * @since       05/09/2014
 * @copyright   Copyright 2014(c) Upwork.com
 * @author      Maksym Novozhylov <mnovozhilov@upwork.com>
 * @license     Upwork's API Terms of Use {@link https://developers.upwork.com/api-tos.html}
 */

namespace Upwork\API\Routers\Hr\Clients;

use Upwork\API\Debug as ApiDebug;
use Upwork\API\Client as ApiClient;

/**
 * Client Job Offers API
 *
 * @link http://developers.upwork.com/w/page/70447610/Client%20Offers
 */
final class Offers extends ApiClient
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
     * Get list of offers
     *
     * @param   array $params Parameters
     * @return  object
     */
    public function getList($params)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/offers/v1/clients/offers', $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Get specific offer
     *
     * @param   integer $reference Offer reference
     * @param   array $params Parameters
     * @return  object
     */
    public function getSpecific($reference, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/offers/v1/clients/offers/' . $reference, $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Send offer
     *
     * @param   array $params Parameters
     * @return  object
     */
    public function makeOffer($params)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->post('/offers/v1/clients/offers', $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }
}
