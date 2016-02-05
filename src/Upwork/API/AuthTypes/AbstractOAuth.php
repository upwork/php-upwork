<?php
/**
 * Abstract Upwork auth library for using with public API by OAuth
 *
 * @final
 * @package     UpworkAPI
 * @since       05/20/2014
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

/**
 * Abstract OAuth Client
 */
abstract class AbstractOAuth
{

    const URL_AUTH      = '/services/api/auth';
    const URL_ATOKEN    = '/auth/v1/oauth/token/access';
    const URL_RTOKEN    = '/auth/v1/oauth/token/request';

    /**
     * @var Consumer key
     */
    static protected $_apiKey = null;
    /**
     * @var Consumer secret
     */
    static protected $_secret = null;
    /**
     * @var oauth_token, shared request token (temporary)
     */
    static protected $_requestToken = null;
    /**
     * @var oauth_token_secret (temporary)
     */
    static protected $_requestSecret = null;
    /**
     * @var Final access token
     */
    static protected $_accessToken = null;
    /**
     * @var Final access token secret
     */
    static protected $_accessSecret = null;
    /**
     * @var OAuth verifier
     */
    static protected $_verifier = null;
    /**
     * @var Entry point name
     */
    static protected $_epoint = 'api';
    /**
     * @var Application mode
     */
    static protected $_mode = 'web';
    /**
     * @var SSL verification flag
     */
    static protected $_verifySsl = true;
    /**
     * @var Signature method
     */
    static protected $_sigMethod = 'HMAC-SHA1';

    /**
     * Constructor 
     * 
     * @param   string $key Application key
     * @param	string $secret Secret key
     * @access  public
     * @throws  ApiException Wrong key or secret
     */
    public function __construct($key, $secret)
    {
        ApiDebug::p('starting ' . __CLASS__ . ' authentication');

        if (!$secret) {
            throw new ApiException('You must define "secret key".');
        } else {
            self::$_secret = (string) $secret;
        }

        if (!$key) {
            throw new ApiException('You must define "application key".');
        } else {
            self::$_apiKey = (string) $key;
        }
    }

    /**
     * Set option
     *
     * @param   string $option Option name
     * @param   mixed $value Option value
     * @access  public
     * @return  boolean
     */
    public static function option($option, $value)
    {
        $name = '_' . $option;

        $r = new \ReflectionClass('\\' . __CLASS__);
        try {
            $r->getProperty($name);
            self::$$name = $value;
            return true;
        } catch (\ReflectionException $e) {
            return false;
        }
    }

    /**
     * Auth process 
     * 
     * @access  public
     * @return  string
     */
    public function auth()
    {
        ApiDebug::p('running auth process in ' . __CLASS__);

        if (self::$_accessToken === null && self::$_verifier === null) {
            if (self::$_requestToken === null && self::$_requestSecret === null) {
                // web-based application should setup and save request token itself
                // to be able use it after callback
                $this->setupRequestToken();
            }

            $authUrl = ApiUtils::getFullUrl(self::URL_AUTH) .
            '?oauth_token=' . self::$_requestToken;

            if (self::$_mode === 'web') {
                // authorize web application via browser
                header('Location: ' . $authUrl);
            } elseif (self::$_mode === 'nonweb') {
                // authorize nonweb application
                ApiDebug::p('found [nonweb] mode, need to autorize application manually');

                $prompt = 'Visit ' . $authUrl . "\n" .
                    'and provide oauth_verifier for further authorization' . "\n" .
                    '$ ';
                if (PHP_OS == 'WINNT') {
                    echo $prompt;
                    $verifier = stream_get_line(STDIN, 1024, PHP_EOL);
                } else {
                    $verifier = readline($prompt);
                }

                // get access token
                $this->_setupAccessToken($verifier);
            }
        } elseif (self::$_accessToken === null && self::$_verifier !== null) {
            // get access token, web-based callback
            $this->_setupAccessToken(self::$_verifier);
        } else {
            // access_token isset
        }

        return array(
            'access_token'  => self::$_accessToken,
            'access_secret' => self::$_accessSecret
        );
    }

    /**
     * Get access token
     *
     * @param	string $verifier OAuth verifier, got after authorization
     * @access	private
     * @return	array
     */
    abstract protected function _setupAccessToken($verifier);

    /**
     * Get OAuth instance
     *
     * @param   integer $authType Auth type
     * @access  public
     * @return  object
     */
    abstract protected function _getOAuthInstance($authType);
}
