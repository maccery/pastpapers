<?php

class GetLevelTest extends TestCase
{

    public function testLevelZero()
    {
        $user = factory(App\User::class)->make();
        $user->points = -5;
        $this->assertEquals(0, $user->level[0]);
    }

    public function testLevelOne()
    {
        $user = factory(App\User::class)->make();
        $user->points = 0;
        $this->assertEquals(1, $user->level[0]);
    }

    public function testLevelTwo()
    {
        $user = factory(App\User::class)->make();
        $user->points = 1;
        $this->assertEquals(1, $user->level[0]);
    }

    public function testLevelThree()
    {
        $user = factory(App\User::class)->make();
        $user->points = 50;
        $this->assertEquals(2, $user->level[0]);
    }

    public function testLevelFour()
    {
        $user = factory(App\User::class)->make();
        $user->points = 100;
        $this->assertEquals(3, $user->level[0]);
    }

    public function testLevelFive()
    {
        $user = factory(App\User::class)->make();
        $user->points = 500;
        $this->assertEquals(4, $user->level[0]);
    }

}