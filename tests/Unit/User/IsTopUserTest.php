<?php

class IsTopUserTest extends TestCase
{

    public function setUp() {
        parent::setUp();
    }

    /**
     * @group IsTopUserTest
     */
    public function testNoEmail()
    {
        $this->userMock->shouldReceive('emailDomain')->atLeast(1)->andReturn(null);
        $this->assertEquals(False, $this->userMock->isTopUser());
    }

    /**
     * @group IsTopUserTest
     */
    public function testTopUser()
    {
        $this->userMock->shouldReceive('emailDomain')->atLeast(1)->andReturn('techcrunch.com');
        $this->assertEquals('techcrunch.com', $this->userMock->isTopUser());
    }

    /**
     * @group IsTopUserTest
     */
    public function testNotTopUser()
    {
        $this->userMock->shouldReceive('emailDomain')->andReturn('crap.com');
        $this->assertFalse($this->userMock->isTopUser());
    }

}