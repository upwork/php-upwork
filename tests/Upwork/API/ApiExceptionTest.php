<?php
namespace Upwork\API\Tests;

require __DIR__ . '/../../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Upwork\API\ApiException as ApiException;

class ApiExceptionTest extends TestCase
{
    /**
     * @expectedException Upwork\API\ApiException
     */
    public function testException()
    {
        $this->expectException(\Upwork\API\ApiException::class);
        throw new ApiException('test');
    }
}
