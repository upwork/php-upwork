<?php
/**
 * Upwork auth library for using with public API by OAuth
 * Work with Milestones
 *
 * @final
 * @package     UpworkAPI
 * @since       11/17/2014
 * @copyright   Copyright 2014(c) Upwork.com
 * @author      Maksym Novozhylov <mnovozhilov@upwork.com>
 * @license     Upwork's API Terms of Use {@link https://developers.upwork.com/api-tos.html}
 */

namespace Upwork\API\Routers\Hr;

use Upwork\API\Debug as ApiDebug;
use Upwork\API\Client as ApiClient;

/**
 * Milestones
 *
 * @link https://developers.upwork.com/?lang=php#contracts-and-offers
 */
final class Milestones extends ApiClient
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
     * Get active Milestone for specific Contract
     *
     * @param   integer $contractId Contract reference
     * @return  object
     */
    public function getActiveMilestone($contractId)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/hr/v3/fp/milestones/statuses/active/contracts/' . $contractId);
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Get all Submissions for specific Milestone
     *
     * @param   integer $milestoneId Milestone ID
     * @return  object
     */
    public function getSubmissions($milestoneId)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/hr/v3/fp/milestones/' . $milestoneId . '/submissions');
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Create a new Milestone
     *
     * @param   array $params Parameters
     * @return  object
     */
    public function create($params)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->post('/hr/v3/fp/milestones', $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Edit an existing Milestone
     *
     * @param   integer $milestoneId Milestone ID
     * @param   array $params Parameters
     * @return  object
     */
    public function edit($milestoneId, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->put('/hr/v3/fp/milestones/' . $milestoneId, $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Activate an existing Milestone
     *
     * @param   integer $milestoneId Milestone ID
     * @param   array $params Parameters
     * @return  object
     */
    public function activate($milestoneId, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->put('/hr/v3/fp/milestones/' . $milestoneId . '/activate', $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Approve an existing Milestone
     *
     * @param   integer $milestoneId Milestone ID
     * @param   array $params Parameters
     * @return  object
     */
    public function approve($milestoneId, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->put('/hr/v3/fp/milestones/' . $milestoneId . '/approve', $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Delete an existing Milestone
     *
     * @param   integer $milestoneId Milestone ID
     * @return  object
     */
    public function delete($milestoneId)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->delete('/hr/v3/fp/milestones/' . $milestoneId);
        ApiDebug::p('found response info', $response);

        return $response;
    }
}
