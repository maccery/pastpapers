<?php

class VerdictTest extends TestCase
{

    protected $version;

    public function setUp() {
        parent::setUp();

        $this->version = Mockery::mock('Illuminate\Database\Eloquent\Model', 'App\Version')->makePartial();
    }

    /**
     * @group VerdictTest
     */
    public function testNegative()
    {
        $this->version->shouldReceive('getAttribute')->with('positive')->andReturn(1);
        $this->version->shouldReceive('getAttribute')->with('negative')->andReturn(2);
        $this->assertEquals('Mainly negative', $this->version->verdict);
    }

    /**
     * @group VerdictTest
     */
    public function testPositive()
    {
        $this->version->shouldReceive('getAttribute')->with('positive')->andReturn(2);
        $this->version->shouldReceive('getAttribute')->with('negative')->andReturn(1);
        $this->assertEquals('Mainly positive', $this->version->verdict);
    }

    /**
     * @group VerdictTest
     */
    public function testNeutral()
    {
        $this->version->shouldReceive('getAttribute')->with('positive')->andReturn(1);
        $this->version->shouldReceive('getAttribute')->with('negative')->andReturn(1);
        $this->assertEquals('No concensus', $this->version->verdict);
    }

    /**
     * @group VerdictTest
     */
    public function testNoReviews()
    {
        $this->version->shouldReceive('getAttribute')->with('positive')->andReturn(0);
        $this->version->shouldReceive('getAttribute')->with('negative')->andReturn(0);
        $this->assertEquals('No concensus', $this->version->verdict);
    }
}