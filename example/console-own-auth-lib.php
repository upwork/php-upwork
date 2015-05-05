<?php
/**
 * Authentication library for Upwork API using OAuth
 * Example: using your own authentication OAuth client
 *
 * @final
 * @package     UpworkAPI
 * @since       05/20/2014
 * @copyright   Copyright 2014(c) Upwork.com
 * @author      Maksym Novozhylov <mnovozhilov@upwork.com>
 * @license     Upwork's API Terms of Use {@link https://developers.upwork.com/api-tos.html}
 */

// Our php-oauth library - used in this example - requires a session
session_start();

require __DIR__ . '/vendor/autoload.php';

// if you already have the tokens, they can be read from session
// or other secure storage
//$_SESSION['access_token'] = 'xxxxxxxxxxxxxxxxxxxxxxxxxxx';
//$_SESSION['access_secret']= 'xxxxxxxxxxxx';

$config = new \Upwork\API\Config(
    array(
        'consumerKey'       => 'xxxxxxxxxxxxxxxxxxxxxxxxxxx',  // SETUP YOUR CONSUMER KEY
        'consumerSecret'    => 'xxxxxxxxxxxx',                // SETUP KEY SECRET
        'accessToken'       => $_SESSION['access_token'],       // got access token
        'accessSecret'      => $_SESSION['access_secret'],      // got access secret
//        'verifySsl'         => false,                           // whether to verify SSL
        'debug'             => true,                            // enables debug mode
        'authType'          => 'OAuthPHPLib' // your own authentication type, see AuthTypes directory
    )
);

$client = new \Upwork\API\Client($config);

// our example AuthType allows assigning already known token data
if (!empty($_SESSION['access_token']) && !empty($_SESSION['access_secret'])) {
    $client->getServer()
        ->getInstance()
        ->addServerToken(
            $config::get('consumerKey'),
            'access',
            $_SESSION['access_token'],
            $_SESSION['access_secret'],
            0
        );
} else {
    // $accessTokenInfo has the following structure
    // array('access_token' => ..., 'access_secret' => ...);
    // keeps the access token in a secure place
    // gets info of authenticated user
    $accessTokenInfo = $client->auth();
}

$auth = new \Upwork\API\Routers\Auth($client);
$info = $auth->getUserInfo();

print_r($info);
