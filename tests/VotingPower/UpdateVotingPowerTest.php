<?php

class UpdateVotingPowerTest extends TestCase
{
    public function setUp() {
        parent::setUp();
        $this->userMock->shouldReceive('save')->andReturnNull();
    }

    /**
     * @group UpdateVotingPowerTest
     */
    public function testUpdateVotingPower()
    {
        $this->userMock->points = 55;
        $this->userMock->updateVotingPower();
        $this->assertEquals(10, $this->userMock->voting_power);
    }

    /**
     * @group UpdateVotingPowerTest
     */
    public function testUpdateVotingPowerTwo()
    {
        $this->userMock->points = 0;
        $this->userMock->updateVotingPower();
        $this->assertEquals(1, $this->userMock->voting_power);
    }

    /**
     * @group UpdateVotingPowerTest
     */
    public function testUpdateVotingPowerThree()
    {
        $this->userMock->points = -5;
        $this->userMock->updateVotingPower();
        $this->assertEquals(0, $this->userMock->voting_power);
    }
}