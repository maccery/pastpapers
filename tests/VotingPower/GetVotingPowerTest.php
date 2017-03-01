<?php

class GetVotingPowerTest extends TestCase
{

    public function setUp() {
        parent::setUp();
    }

    /**
     * @group GetVotingPowerTest
     */
    public function testVotingPower()
    {
        $this->userMock->points = 55;
        $voting_power = $this->userMock->getVotingPower();
        $this->assertEquals(10, $voting_power);
    }

    /**
     * @group GetVotingPowerTest
     */
    public function testVotingPowerTwo()
    {
        $this->userMock->points = 0;
        $voting_power = $this->userMock->getVotingPower();
        $this->assertEquals(1, $voting_power);
    }

}