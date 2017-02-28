<?php

class UpdateVotingPowerTest extends TestCase
{
    protected $userMock;

    public function setUp() {
        parent::setUp();

        $user = factory(App\User::class)->make();
        $this->userMock = Mockery::mock($user);
        $this->userMock->shouldReceive('updateVotingPower')->passthru();
        $this->userMock->shouldReceive('save')->andReturnNull();
    }

    public function testUpdateVotingPower()
    {
        $this->userMock->points = 55;
        $this->userMock->updateVotingPower();
        $this->assertEquals(10, $this->userMock->voting_power);
    }

    public function testUpdateVotingPowerTwo()
    {
        $this->userMock->points = 0;
        $this->userMock->updateVotingPower();
        $this->assertEquals(1, $this->userMock->voting_power);
    }

    public function testUpdateVotingPowerThree()
    {
        $this->userMock->points = -5;
        $this->userMock->updateVotingPower();
        $this->assertEquals(0, $this->userMock->voting_power);
    }
}