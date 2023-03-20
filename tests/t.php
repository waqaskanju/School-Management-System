<?php
use PHPUnit\Framework\TestCase;

class t extends TestCase
{
    public function testAddReturnsTheCorrectSum()
    {
        include 'fun.php';

        $this->assertEquals(4, add(2, 5));
        $this->assertEquals(8, add(3, 5));

    }

}



?>