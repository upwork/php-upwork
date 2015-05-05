<?php
/**
 * Upwork auth library for using with public API by OAuth
 * Financial Reporting
 *
 * @final
 * @package     UpworkAPI
 * @since       05/02/2014
 * @copyright   Copyright 2014(c) Upwork.com
 * @author      Maksym Novozhylov <mnovozhilov@upwork.com>
 * @license     Upwork's API Terms of Use {@link https://developers.upwork.com/api-tos.html}
 */

namespace Upwork\API\Routers\Reports\Finance;

use Upwork\API\Debug as ApiDebug;
use Upwork\API\Client as ApiClient;

/**
 * Financial Reporting
 *
 * @link http://developers.upwork.com/Financial-Reports-GDS-API
 */
final class Billings extends ApiClient
{
    const ENTRY_POINT = UPWORK_GDS_EP_NAME;

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
     * Generate Billing Reports for a Specific Freelancer
     *
     * @param   integer $freelancerReference Freelancer reference
     * @param   array $params Parameters
     * @return  object
     */
    public function getByFreelancer($freelancerReference, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $report = $this->_client->get('/finreports/v2/providers/' . $freelancerReference . '/billings', $params);
        ApiDebug::p('found report info', $report);

        return $report;
    }

    /**
     * Generate Billing Reports for a Specific Freelancer's Team
     *
     * @param   integer $freelancerTeamReference Freelancer team reference
     * @param   array $params Parameters
     * @return  object
     */
    public function getByFreelancersTeam($freelancerTeamReference, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $report = $this->_client->get('/finreports/v2/provider_teams/' . $freelancerTeamReference . '/billings', $params);
        ApiDebug::p('found report info', $report);

        return $report;
    }

    /**
     * Generate Billing Reports for a Specific Freelancer's Company
     *
     * @param   integer $freelancerCompanyReference Freelancer company reference
     * @param   array $params Parameters
     * @return  object
     */
    public function getByFreelancersCompany($freelancerCompanyReference, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $report = $this->_client->get('/finreports/v2/provider_companies/' . $freelancerCompanyReference . '/billings', $params);
        ApiDebug::p('found report info', $report);

        return $report;
    }

    /**
     * Generate Billing Reports for a Specific Buyer's Team
     *
     * @param   integer $buyerTeamReference Buyer team reference
     * @param   array $params Parameters
     * @return  object
     */
    public function getByBuyersTeam($buyerTeamReference, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $report = $this->_client->get('/finreports/v2/buyer_teams/' . $buyerTeamReference . '/billings', $params);
        ApiDebug::p('found report info', $report);

        return $report;
    }

    /**
     * Generate Billing Reports for a Specific Buyer's Company
     *
     * @param   integer $buyerCompanyReference Buyer company reference
     * @param   array $params Parameters
     * @return  object
     */
    public function getByBuyersCompany($buyerCompanyReference, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $report = $this->_client->get('/finreports/v2/buyer_companies/' . $buyerCompanyReference . '/billings', $params);
        ApiDebug::p('found report info', $report);

        return $report;
    }
}
