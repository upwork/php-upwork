<?php
namespace Upwork\API\Tests;

require __DIR__ . '/../../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Upwork\API\Debug as ApiDebug;

class DebugTest extends TestCase
{
    /**
     * @test
     */
    public function testPrintDebugMessage()
    {
        $reflection = new \ReflectionClass('Upwork\API\Debug');
        $property = $reflection->getProperty('_debug');
        $property->setAccessible(true);
        $helper = new ApiDebug();
        $property->setValue($helper, true);

        ob_start();
        ApiDebug::p('test message');
        $output = ob_get_contents();
        ob_end_clean();

        $this->assertStringContainsString('test message', $output);
        $property->setValue($helper, false);
    }
}
