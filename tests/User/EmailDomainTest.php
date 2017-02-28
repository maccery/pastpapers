<?php

class EmailDomainTest extends TestCase
{

    public function testNoDomain() {
        $user = factory(App\User::class)->make();
        $user->email = '';
        $this->assertEquals(null, $user->emailDomain());
    }

    public function testOneDomain() {
        $user = factory(App\User::class)->make();
        $user->email = 'tom@christmas.com';
        $this->assertEquals('christmas.com', $user->emailDomain());
    }

}