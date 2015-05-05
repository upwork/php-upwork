<?php
/**
 * Upwork auth library for using with public API by OAuth
 * Jobs
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
 * Jobs API
 *
 * @link http://developers.upwork.com/Jobs-HR-API
 */
final class Jobs extends ApiClient
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
     * Get list of jobs
     *
     * @param   array $params Parameters
     * @return  object
     */
    public function getList($params)
    {
        ApiDebug::p(__FUNCTION__);

        $jobs = $this->_client->get('/hr/v2/jobs', $params);
        ApiDebug::p('found response info', $jobs);

        return $jobs;
    }

    /**
     * Get specific job by key
     *
     * @param   string $key Job key
     * @return  object
     */
    public function getSpecific($key)
    {
        ApiDebug::p(__FUNCTION__);

        $job = $this->_client->get('/hr/v2/jobs/' . $key);
        ApiDebug::p('found response info', $job);

        return $job;
    }

    /**
     * Post a new job
     *
     * @param   array $params Parameters
     * @return  object
     */
    public function postJob($params)
    {
        ApiDebug::p(__FUNCTION__);

        $job = $this->_client->post('/hr/v2/jobs', $params);
        ApiDebug::p('found response info', $job);

        return $job;
    }

    /**
     * Edit existend job
     *
     * @param   string $key Job key
     * @param   array $params Parameters
     * @return  object
     */
    public function editJob($key, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $job = $this->_client->put('/hr/v2/jobs/' . $key, $params);
        ApiDebug::p('found response info', $job);

        return $job;
    }

    /**
     * Delete existend job
     *
     * @param   string $key Job key
     * @param   array $params Parameters
     * @return  object
     */
    public function deleteJob($key, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $job = $this->_client->delete('/hr/v2/jobs/' . $key, $params);
        ApiDebug::p('found response info', $job);

        return $job;
    }
}
