<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserVotedTest extends TestCase
{

    use DatabaseMigrations;

    public function testVote()
    {
        $users = \App\User::all();
        $this->assertEquals(1,1);
    }
}