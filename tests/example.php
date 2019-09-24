<?php

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function testAddingTwoPlusTwoResultFour()
    {
        $this->assertEquals(4, 2 + 2);
    }
}
