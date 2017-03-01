<?php

class GetLevelTest extends TestCase
{
    public function setUp() {
        parent::setUp();
    }
    
    public function testLevelZero()
    {
        $this->userMock->points = -5;
        $this->assertEquals(0, $this->userMock->level[0]);
    }

    public function testLevelOne()
    {
        $this->userMock->points = 0;
        $this->assertEquals(1, $this->userMock->level[0]);
    }

    public function testLevelTwo()
    {
        $this->userMock = factory(App\User::class)->make();
        $this->userMock->points = 1;
        $this->assertEquals(1, $this->userMock->level[0]);
    }

    public function testLevelThree()
    {
        $this->userMock->points = 50;
        $this->assertEquals(2, $this->userMock->level[0]);
    }

    public function testLevelFour()
    {
        $this->userMock->points = 100;
        $this->assertEquals(3, $this->userMock->level[0]);
    }

    public function testLevelFive()
    {
        $this->userMock->points = 500;
        $this->assertEquals(4, $this->userMock->level[0]);
    }

}