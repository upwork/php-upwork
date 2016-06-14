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

require __DIR__ . '/vendor/autoload.php';

// if you already have the tokens, they can be read from session
// or other secure storage
//$_SESSION['access_token'] = 'xxxxxxxxxxxxxxxxxxxxxxxxxxx';
//$_SESSION['access_secret']= 'xxxxxxxxxxxx';

$config = new \Upwork\API\Config(
    array(
        'consumerKey'       => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxx',  // SETUP YOUR CONSUMER KEY
        'consumerSecret'    => 'xxxxxxxxxxxxxx',                // SETUP KEY SECRET
        'accessToken'       => $_SESSION['access_token'],       // got access token
        'accessSecret'      => $_SESSION['access_secret'],      // got access secret
        'debug'             => true,                            // enables debug mode
//	'authType' => 'MyOAuth' // your own authentication type, see AuthTypes directory
    )
);

$client = new \Upwork\API\Client($config);

$accessTokenInfo = $client->auth();
// $accessTokenInfo has the following structure
// array('access_token' => ..., 'access_secret' => ...);
// keeps the access token in a secure place

// gets info of the authenticated user
$auth = new \Upwork\API\Routers\Auth($client);
$info = $auth->getUserInfo();

print_r($info);
