<?php
/**
 * Upwork auth library for using with public API by OAuth
 * Custom Payments
 *
 * @final
 * @package     UpworkAPI
 * @since       05/02/2014
 * @copyright   Copyright 2014(c) Upwork.com
 * @author      Maksym Novozhylov <mnovozhilov@upwork.com>
 * @license     Upwork's API Terms of Use {@link https://developers.upwork.com/api-tos.html}
 */

namespace Upwork\API\Routers;

use Upwork\API\Debug as ApiDebug;
use Upwork\API\Client as ApiClient;

/**
 * Custom Payments
 *
 * @link http://developers.upwork.com/Custom-Payment-API
 */
final class Payments extends ApiClient
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
     * Submit a Custom Payment
     *
     * @param   integer $teamReference Team reference
     * @param   array $params Parameters
     * @return  object
     */
    public function submitBonus($teamReference, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $adjustments = $this->_client->post('/hr/v2/teams/' . $teamReference . '/adjustments', $params);
        ApiDebug::p('found adjustments info', $adjustments);

        return $adjustments;
    }
}
