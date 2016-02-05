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

// Iclude own library
require_once __DIR__ . '/../../../../vendor-src/oauth-php/library/OAuthStore.php';
require_once __DIR__ . '/../../../../vendor-src/oauth-php/library/OAuthRequester.php';

/**
 * OAuth 1.0a Client based on OAuth PHP Library as an example
 * see https://code.google.com/p/oauth-php/
 */
final class OAuthPHPLib extends AbstractOAuth implements ApiClient
{
    /**
     * Get instance
     *
     * @return  object
     * @access  public
     */
    public function getInstance()
    {
        return $this->_getOAuthInstance();
    }

    /**
     * Do request 
     * 
     * @param   string $type Type of request
     * @param   string $url URL
     * @param   array $params (Optional) Parameters
     * @access  public
     * @return  mixed
     */
    public function request($type, $url, $params = array())
    {
        ApiDebug::p('running request from ' . __CLASS__);

        $this->_getOAuthInstance();

        $request = new \OAuthRequester(ApiUtils::getFullUrl($url, self::$_epoint), $type, $params);
        $data = $request->doRequest(0, self::_getCurlOptions());

        ApiDebug::p('got response from server', $data);

        return $data['body'];
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

        $this->_getOAuthInstance();
        $requestTokenInfo = \OAuthRequester::requestRequestToken(
            self::$_apiKey,
            0,
            array(),
            'POST',
            array(),
            self::_getCurlOptions()
        );

        // add token_secret to response
        $requestTokenInfo['token_secret'] = $_SESSION['oauth_' . self::$_apiKey]['token_secret'];

        ApiDebug::p('got request token info', $requestTokenInfo);

        self::$_requestToken  = $requestTokenInfo['token'];
        self::$_requestSecret = $requestTokenInfo['token_secret'];

        return array('oauth_token' => $requestTokenInfo['token'], 'oauth_token_secret' => $requestTokenInfo['token_secret']);
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

        $accessTokenInfo = array();

        $this->_getOAuthInstance();
        \OAuthRequester::requestAccessToken(
            self::$_apiKey,
            self::$_requestToken,
            0,
            'POST',
            array('oauth_verifier' => $verifier),
            self::_getCurlOptions()
        );

        $accessTokenInfo['oauth_token']         = $_SESSION['oauth_' . self::$_apiKey]['token'];
        $accessTokenInfo['oauth_token_secret']  = $_SESSION['oauth_' . self::$_apiKey]['token_secret'];

        ApiDebug::p('got access token info', $accessTokenInfo);

        self::$_accessToken     = $accessTokenInfo['oauth_token'];
        self::$_accessSecret    = $accessTokenInfo['oauth_token_secret'];

        return $accessTokenInfo;
    }

    /**
     * Get OAuth instance
     *
     * @param   integer $authType (Optional) Auth type
     * @access  protected
     * @return  object
     */
    protected function _getOAuthInstance($authType = null)
    {
        ApiDebug::p('get OAuth instance');

        $options = array(
            'consumer_key' => self::$_apiKey, 
            'consumer_secret' => self::$_secret,
            'server_uri' => UPWORK_BASE_URL,
            'request_token_uri' => ApiUtils::getFullUrl(self::URL_RTOKEN, 'api'),
            'authorize_uri' => self::URL_AUTH,
            'access_token_uri' => ApiUtils::getFullUrl(self::URL_ATOKEN, 'api')
        );
        
        $oauth = \OAuthStore::instance('Session', $options);

        return $oauth;
    }

    /**
     * Get curl options
     *
     * @static
     * @return  array
     * @access  private
     */
    private static function _getCurlOptions()
    {
        $options = array();
        $options[CURLOPT_SSL_VERIFYPEER] = self::$_verifySsl;

        return $options;
    }
}
