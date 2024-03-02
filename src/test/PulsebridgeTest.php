<?php

use PHPUnit\Framework\TestCase;
use Nmpl\Pulsebridge\Pulsebridge;

class PulsebridgeTest extends TestCase
{
    private $smsgateway;

    protected function setUp(): void
    {
        $this->smsgateway = new Pulsebridge();
        $this->smsgateway->setDataPath(__DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR);
        $this->smsgateway->setSharedSecret("secret");
    }

    public function testInitialization()
    {
        $this->assertInstanceOf(Pulsebridge::class, $this->smsgateway);
    }

    public function testSetAndGetDeviceId()
    {
        $deviceId = "testDevice";
        $this->smsgateway->setDeviceId($deviceId);
        $this->assertEquals($deviceId, $this->smsgateway->getDeviceId());
    }

    public function testSetAndGetSharedSecret()
    {
        $sharedSecret = "newSecret";
        $this->smsgateway->setSharedSecret($sharedSecret);
        $this->assertEquals($sharedSecret, $this->smsgateway->getSharedSecret());
    }

    // Add tests for other getters and setters...

    public function testSendMessage()
    {
        $to = "+1234567890";
        $content = "Test message content";
        $messageId = $this->smsgateway->sendMessage("testDevice", $to, $content);

        // Assert that the message ID is not empty and follows the expected format
        $this->assertNotEmpty($messageId);
        $this->assertMatchesRegularExpression('/^[a-zA-Z0-9-]+$/', $messageId);

        // Add more assertions for the sent message...
    }
}
