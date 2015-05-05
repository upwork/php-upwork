<?php
/**
 * Upwork auth library for using with public API by OAuth
 *
 * @final
 * @package     UpworkAPI
 * @since       04/21/2014
 * @copyright   Copyright 2014(c) Upwork.com
 * @author      Maksym Novozhylov <mnovozhilov@upwork.com>
 * @license     Upwork's API Terms of Use {@link https://developers.upwork.com/api-tos.html}
 */

namespace Upwork\API\Interfaces;

/**
 * Client Interface for AuthTypes
 */
interface Client
{
    /**
     * Authentication
     *
     * @access  public
     */
    public function auth();

    /**
     * Request to API server
     *
     * @param   string $type Type of request, i.e. http method
     * @param   string $url URL
     * @param   array $params (Optional) List of additional parameters
     * @access  public
     */
    public function request($type, $url, $params = array());

    /**
     * Request token from server, i.e. setup it on server and return to client
     *
     * @access  public
     */
    public function setupRequestToken();
}
