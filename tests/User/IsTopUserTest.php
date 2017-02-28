<?php

class IsTopUserTest extends TestCase
{

    protected $userMock;

    public function setUp() {
        parent::setUp();

        $user = factory(App\User::class)->make();
        $this->userMock = Mockery::mock($user);
    }

    /**
     * @group IsTopUserTest
     */
    public function testNoEmail()
    {
        $this->userMock->shouldReceive('emailDomain')->atLeast(1)->andReturn(null);
        $this->userMock->shouldReceive('isTopUser')->passthru();
        $this->assertEquals(False, $this->userMock->isTopUser());
    }

    /**
     * @group IsTopUserTest
     */
    public function testTopUser()
    {
        $this->userMock->shouldReceive('emailDomain')->atLeast(1)->andReturn('techcrunch.com');
        $this->userMock->shouldReceive('isTopUser')->passthru();
        $this->assertEquals('techcrunch.com', $this->userMock->isTopUser());
    }

    /**
     * @group IsTopUserTest
     */
    public function testNotTopUser()
    {
        $this->userMock->shouldReceive('emailDomain')->andReturn('crap.com');
        $this->userMock->shouldReceive('isTopUser')->passthru();
        $this->assertFalse($this->userMock->isTopUser());
    }

}