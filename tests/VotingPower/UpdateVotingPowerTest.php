<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UpdateVotingPowerTest extends TestCase
{

    use DatabaseMigrations;
    use DatabaseTransactions;

    public function testUpdateVotingPower()
    {
        $user = factory(App\User::class)->make();
        $user->points = 55;
        $user->updateVotingPower();
        $this->assertEquals(10, $user->voting_power);
    }

    public function testUpdateVotingPowerTwo()
    {
        $user = factory(App\User::class)->make();
        $user->points = 0;
        $user->updateVotingPower();
        $this->assertEquals(1, $user->voting_power);
    }

    public function testUpdateVotingPowerThree()
    {
        $user = factory(App\User::class)->make();
        $user->points = -5;
        $user->updateVotingPower();
        $this->assertEquals(0, $user->voting_power);
    }
}