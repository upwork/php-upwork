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

namespace Upwork\API;

use Upwork\API\Debug as ApiDebug;

/**
 * Utils
 */
final class Utils
{
    /**
     * Get full url, based on global constant
     *
     * @param	string $url Relative URL
     * @param	string $ep (Optional) Entry point
     * @static
     * @access	public
     * @return	string
     */
    static public function getFullUrl($url, $ep = null)
    {
        ApiDebug::p('create full url, based on global constant');

        $name = ($ep)
            ? 'UPWORK_BASE_URL_' . strtoupper($ep)
            : 'UPWORK_BASE_URL';

        $fullUrl = constant($name) . $url;
        ApiDebug::p('url', $fullUrl);

        return $fullUrl;
    }
}
