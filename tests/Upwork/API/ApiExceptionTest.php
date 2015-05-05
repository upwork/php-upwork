<?php
namespace Upwork\API\Tests;

require __DIR__ . '/../../../vendor/autoload.php';

use Upwork\API\ApiException as ApiException;

class ApiExceptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException Upwork\API\ApiException
     */
    public function testException()
    {
        throw new ApiException('test');
    }
}
