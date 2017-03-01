<?php

class EmailDomainTest extends TestCase
{

    public function testNoDomain() {
        $this->userMock->email = '';
        $this->assertEquals(null, $this->userMock->emailDomain());
    }

    public function testOneDomain() {
        $this->userMock->email = 'tom@christmas.com';
        $this->assertEquals('christmas.com', $this->userMock->emailDomain());
    }

}