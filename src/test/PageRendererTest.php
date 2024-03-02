<?php


use Nmpl\Pulsebridge\Logger;
use Nmpl\Pulsebridge\PageRenderer;
use Nmpl\Pulsebridge\Pulsebridge;
use PHPUnit\Framework\TestCase;

class PageRendererTest extends TestCase
{
    public function testConstructor()
    {
        // Mock objects for Pulsebridge and Logger
        $pulsebridgeMock = $this->createMock(Pulsebridge::class);
        $loggerMock = $this->createMock(Logger::class);

        // Expect the setDataPath method to be called on Pulsebridge
        $pulsebridgeMock->expects($this->once())
            ->method('setDataPath');

        // Expect the log method to be called on Logger
        $loggerMock->expects($this->once())
            ->method('log')
            ->with($this->equalTo('Renderer Instantiated'));

        // Create PageRenderer instance with mock objects
        $renderer = new PageRenderer($pulsebridgeMock, $loggerMock);

    }

}
