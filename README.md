PHP bindings for Upwork API
============

[![License](http://img.shields.io/packagist/l/upwork/php-upwork.svg)](http://www.apache.org/licenses/LICENSE-2.0.html)
[![Latest Stable Version](https://poser.pugx.org/upwork/php-upwork/v/stable.svg)](https://github.com/upwork/php-upwork/releases)
[![Package version](http://img.shields.io/packagist/v/upwork/php-upwork.svg)](https://packagist.org/packages/upwork/php-upwork)
[![Build status](https://travis-ci.org/upwork/php-upwork.svg)](http://travis-ci.org/upwork/php-upwork)
[![Monthly downloads](http://img.shields.io/packagist/dm/upwork/php-upwork.svg)](https://packagist.org/packages/upwork/php-upwork)

# Introduction
This project provides a set of resources of Upwork API from http://developers.upwork.com
 based on OAuth 1.0a.

# Features
These are the supported API resources:

* My Info
* Custom Payments
* Hiring
* Job and Freelancer Profile
* Search Jobs and Freelancers
* Organization
* MC
* Time and Financial Reporting
* Metadata
* Snapshot
* Team
* Workd Diary
* Activities

# License

Copyright 2015 Upwork Corporation. All Rights Reserved.

php-upwork is licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.

## SLA
The usage of this API is ruled by the Terms of Use at:

    https://developers.upwork.com/api-tos.html

# Application Integration
To integrate this library you need to have:

* PHP >= 5.3.0
* OAuth Extension installed (optional), we recommend using official pecl
  extension, but in case you want to use your own library, you need to drop
  line 'ext-oauth' from composer json, or do not use composer, which is
  also optional. In that case, you need to setup the 'authType' parameter
  in your configuration options. The source contains an oauth-php library
  that can be used as alternative. See more in the AuthTypes directory if 
  you want to create an authentication layer for your own client library.
* Composer installed (optional)

## Example
In addition to this, a full example is available in the `example` directory. 
This includes `console.php` that gets an access token and requests the data
for applications that are not web-based, and `web.php` for web-based applications.
There is also `console-own-auth-lib.php` available to use your own php client together with this Upwork library.

There is also a `composer.json` included to use with Composer.

## Composer
In order to easily integrate with your application we recommend using
[Composer](https://getcomposer.org) to install the dependencies.

Below is a simple example `composer.json` file you can use:

    {
        "name": "upwork/my-oauth-app",
        "require": {
            "upwork/php-upwork": "dev-master"
        }
    }

## Installation using Composer
1.
Add `upwork/php-upwork` to your `composer.json`, simple example:
```
{
    "name": "my/my-oauth-app",
    "require": {
        "upwork/php-upwork": "v1.0.1" // note: the latest release is recommended
    }
}
```

2.
run the following command `/usr/local/bin/composer.phar update`

the output should look similar to
```
Loading composer repositories with package information
Updating dependencies (including require-dev)
  - Installing upwork/php-upwork (v1.0.1)
    Downloading: 100%         

Writing lock file
Generating autoload files
```

3.
IMPORTANT:
The library supports different OAuth clients, by default it requires PECL PHP extension (see more at http://www.php.net/oauth). Make sure it is installed. In case you don't
want to use it, or have no possibility to install it, you may want to use a preloaded
php library, called oauth-php (read more in vendor-src/README).

copy `vendor/upwork/php-upwork/example/console.php` to the `myapp.php` if you have
`ext-oauth` installed

or

copy `vendor/upwork/php-upwork/example/console-own-auth-lib.php` to `myapp.php` if
you want to use preloaded php library as OAuth client

otherwise

 - check `vendor/upwork/php-upwork/src/Upwork/API/AuthTypes/` and create your own wrapper
for OAuth
 - copy `vendor/upwork/php-upwork/example/console-own-auth-lib.php` to `myapp.php`
 - after that update 'authType' property in the configuration section of
`myapp.php` and specify the name of your handler.

*NOTE: use `web.php` example if you are creating a web-based application.*

4.
open `myapp.php` and type the consumerKey and consumerSecret that you previously got from the API Center.
***That's all. Run your app as `php myapp.php` and have fun.***

## Installation by downloading sources
1.
Download latest release from https://github.com/upwork/php-upwork/releases, 
let's say it is https://github.com/upwork/php-upwork/archive/v1.0.1.tar.gz, and
extract it to `vendor/upwork` folder, located in the root of your application.

2.
Create vendor/autoload.php, a possible simple variant could be:
```
require_once __DIR__ . '/upwork/php-upwork-1.0.1/src/Upwork/API/constants.php';

spl_autoload_register('UpworkVendorAutoloader');

function UpworkVendorAutoloader($_class)
{
    $path = __DIR__ . '/upwork/php-upwork-1.0.1/src/' . str_replace('\\', '/', $_class) . '.php';
    include_once $path;
}
```

3.
open `myapp.php` and type the consumerKey and consumerSecret that you previously got from the API Center.

***That's all. Run your app as `php myapp.php` and have fun.***
