<?php

class VotingPowerTest extends TestCase
{

    public function testVotingPower()
    {
        $user = factory(App\User::class)->make();
        $user->points = 55;
        $voting_power = $user->getVotingPower();
        $this->assertEquals(10, $voting_power);
    }

    public function testVotingPowerTwo()
    {
        $user = factory(App\User::class)->make();
        $user->points = 0;
        $voting_power = $user->getVotingPower();
        $this->assertEquals(1, $voting_power);
    }

}