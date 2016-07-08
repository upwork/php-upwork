<?php
/**
 * Upwork auth library for using with public API by OAuth
 * Work with Submissions
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
 * Submissions
 *
 * @link https://developers.upwork.com/?lang=php#contracts-and-offers
 */
final class Submissions extends ApiClient
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
     * Freelancer submits work for the client to approve
     *
     * @param   array $params Parameters
     * @return  object
     */
    public function requestApproval($params)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->post('/hr/v3/fp/submissions', $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Approve an existing Submission
     *
     * @param   integer Submission ID
     * @param   array $params Parameters
     * @return  object
     */
    public function approve($submissionId, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->put('/hr/v3/fp/submissions/' . $submissionId . '/approve', $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Reject an existing Submission
     *
     * @param   integer Submission ID
     * @param   array $params Parameters
     * @return  object
     */
    public function reject($submissionId, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->put('/hr/v3/fp/submissions/' . $submissionId . '/reject', $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }
}
