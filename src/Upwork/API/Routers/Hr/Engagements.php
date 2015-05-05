<?php
/**
 * Upwork auth library for using with public API by OAuth
 * Engagements
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
 * Engagements API
 *
 * @link http://developers.upwork.com/Engagements-API
 */
final class Engagements extends ApiClient
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
     * Get list of engagements
     *
     * @param   array $params Parameters
     * @return  object
     */
    public function getList($params)
    {
        ApiDebug::p(__FUNCTION__);

        $engagements = $this->_client->get('/hr/v2/engagements', $params);
        ApiDebug::p('found response info', $engagements);

        return $engagements;
    }

    /**
     * Get specific engagement
     *
     * @param   integer $reference Engagement's reference
     * @return  object
     */
    public function getSpecific($reference)
    {
        ApiDebug::p(__FUNCTION__);

        $engagement = $this->_client->get('/hr/v2/engagements/' . $reference);
        ApiDebug::p('found response info', $engagement);

        return $engagement;
    }
}
