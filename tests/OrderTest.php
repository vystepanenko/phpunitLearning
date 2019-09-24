<?php

use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    public function testOrderIsProcessed()
    {
        $getway = $this->getMockBuilder('PaymentGateway')
                    ->setMethods(['charge'])
                    ->getMock();

        $getway->expects($this->once())
                ->method('charge')
                ->with($this->equalTo(200))
                ->willReturn(true);

        $order = new Order($getway);
        $order->amount = 200;
        $this->assertTrue($order->process());
    }

    public function testOrderIsProcessedUsingMockery()
    {
        $getway = Mockery::mock('PaymentGateway');

        $getway->shouldReceive('charge')
                ->once()
                ->with(200)
                ->andReturn(true); 

        $order = new Order($getway);
        $order->amount = 200;
        $this->assertTrue($order->process());
    }
}
