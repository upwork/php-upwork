<?php
/**
 * Upwork auth library for using with public API by OAuth
 *
 * @final
 * @package     UpworkAPI
 * @since       04/22/2014
 * @copyright   Copyright 2014(c) Upwork.com
 * @author      Maksym Novozhylov <mnovozhilov@upwork.com> 
 * @license     Upwork's API Terms of Use {@link https://developers.upwork.com/api-tos.html}
 */

namespace Upwork\API\AuthTypes;

use Upwork\API\Debug as ApiDebug;
use Upwork\API\Config as ApiConfig;
use Upwork\API\Interfaces\Client as ApiClient;
use Upwork\API\Utils as ApiUtils;
use Upwork\API\ApiException as ApiException;
use Upwork\API\AuthTypes\AbstractOAuth as AbstractOAuth;

/**
 * OAuth 1.0a Client
 */
final class OAuth1 extends AbstractOAuth implements ApiClient
{
    /**
     * Do request 
     * 
     * @param   string $type Type of request
     * @param   string $url URL
     * @param   array $params (Optional) Parameters
     * @static
     * @access  public
     * @return  mixed
     */
    public function request($type, $url, $params = array())
    {
        ApiDebug::p('running request from ' . __CLASS__);

        $authType = ($type == 'GET') ? OAUTH_AUTH_TYPE_URI : OAUTH_AUTH_TYPE_FORM;

        $oauth = $this->_getOAuthInstance($authType);

        $oauth->setToken(self::$_accessToken, self::$_accessSecret);
        try {
            $oauth->fetch(ApiUtils::getFullUrl($url, self::$_epoint), $params, $type);
        } catch (\OAuthException $e) {
            //
        }

        $data = $oauth->getLastResponse();

        ApiDebug::p('got response from server', $data);

        return $data;
    }

    /**
     * Get and setup request token
     *
     * @access  public
     * @return  array
     */
    public function setupRequestToken()
    {
        ApiDebug::p('query request token from server');

        $oauth = $this->_getOAuthInstance(OAUTH_AUTH_TYPE_FORM);
        $requestTokenInfo = $oauth->getRequestToken(
            ApiUtils::getFullUrl(self::URL_RTOKEN, 'api')
        );
        ApiDebug::p('got request token info', $requestTokenInfo);

        self::$_requestToken  = $requestTokenInfo['oauth_token'];
        self::$_requestSecret = $requestTokenInfo['oauth_token_secret'];

        return $requestTokenInfo;
    }

    /**
     * Get access token
     *
     * @param	string $verifier OAuth verifier, got after authorization
     * @access	protected
     * @return	array
     */
    protected function _setupAccessToken($verifier)
    {
        ApiDebug::p('requesting access token');

        $oauth = $this->_getOAuthInstance(OAUTH_AUTH_TYPE_FORM);
        $oauth->setToken(self::$_requestToken, self::$_requestSecret);
        $accessTokenInfo = $oauth->getAccessToken(
            ApiUtils::getFullUrl(self::URL_ATOKEN, 'api'),
            null,
            $verifier
        );

        ApiDebug::p('got access token info', $accessTokenInfo);

        self::$_accessToken     = $accessTokenInfo['oauth_token'];
        self::$_accessSecret    = $accessTokenInfo['oauth_token_secret'];

        return $accessTokenInfo;
    }

    /**
     * Get OAuth instance
     *
     * @param   integer $authType Auth type
     * @access  protected
     * @return  object
     */
    protected function _getOAuthInstance($authType)
    {
        ApiDebug::p('get OAuth instance');

        $oauth = new \OAuth(
            self::$_apiKey,
            self::$_secret,
            self::$_sigMethod,
            $authType
        );

        if (ApiConfig::get('debug')) {
            $oauth->enableDebug();
        }

        if (!self::$_verifySsl) {
            $oauth->disableSSLChecks();
        }

        return $oauth;
    }
}
