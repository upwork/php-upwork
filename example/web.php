<?php
/**
 * Authentication library for Upwork API using OAuth
 *
 * @final
 * @package     UpworkAPI
 * @since       04/21/2014
 * @copyright   Copyright 2014(c) Upwork.com
 * @author      Maksym Novozhylov <mnovozhilov@upwork.com>
 * @license     Upwork's API Terms of Use {@link https://developers.upwork.com/api-tos.html}
 */
session_start();

require __DIR__ . '/vendor/autoload.php';

$config = new \Upwork\API\Config(
    array(
        'consumerKey'       => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxx',  // SETUP YOUR CONSUMER KEY
        'consumerSecret'    => 'xxxxxxxxxxxxx',                  // SETUP YOUR KEY SECRET
        'accessToken'       => $_SESSION['access_token'],       // got access token
        'accessSecret'      => $_SESSION['access_secret'],      // got access secret
        'requestToken'      => $_SESSION['request_token'],      // got request token
        'requestSecret'     => $_SESSION['request_secret'],     // got request secret
        'verifier'          => $_GET['oauth_verifier'],         // got oauth verifier after authorization
        'mode'              => 'web',                           // can be 'nonweb' for console apps (default),
                                                                // and 'web' for web-based apps
//	'debug' => true, // enables debug mode. Note that enabling debug in web-based applications can block redirects
//	'authType' => 'MyOAuth' // your own authentication type, see AuthTypes directory
    )
);

$client = new \Upwork\API\Client($config);

if (empty($_SESSION['request_token']) && empty($_SESSION['access_token'])) {
    // we need to get and save the request token. It will be used again
    // after the redirect from the Upwork site
    $requestTokenInfo = $client->getRequestToken();

    $_SESSION['request_token']  = $requestTokenInfo['oauth_token'];
    $_SESSION['request_secret'] = $requestTokenInfo['oauth_token_secret'];
    // request authorization
    $client->auth();
} elseif (empty($_SESSION['access_token'])) {
    // the callback request should be pointed to this script as well as
    // the request access token after the callback
    $accessTokenInfo = $client->auth();

    $_SESSION['access_token']   = $accessTokenInfo['access_token'];
    $_SESSION['access_secret']  = $accessTokenInfo['access_secret'];
}
// $accessTokenInfo has the following structure
// array('access_token' => ..., 'access_secret' => ...);
// keeps the access token in a secure place

// if authenticated
if ($_SESSION['access_token']) {
    // clean up session data
    unset($_SESSION['request_token']);
    unset($_SESSION['request_secret']);

    // gets info of the authenticated user
    $auth = new \Upwork\API\Routers\Auth($client);
    $info = $auth->getUserInfo();

    print_r($info);
}
