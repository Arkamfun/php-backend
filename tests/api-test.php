<?php
define('PHPUNIT', true);

use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase
{
    public function testApiResponse()
    {
        ob_start();
        require_once __DIR__ . '/../api.php';
        $ouput = ob_get_contents();

        $response = json_decode($ouput, true);

        $this->assertArrayHasKey('status', $response);
        $this->assertEquals("success", $response['status']);
        $this->assertArrayHasKey('message', $response);
        $this->assertEquals('hello from Jenkins CI/CD pipeline!', $response['message']);
    }
}
