<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class CanSearchTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * @group SystemTest
     */
    public function testEmptySearch()
    {
        $this->visitRoute('home')
            ->type('', 'query')
            ->press('search')
            ->see('The query field is required.');
    }

    /**
     * @group SystemTest
     */
    public function testEmptySearchFroMSearch()
    {
        $this->visitRoute('home')
            ->type('ffsd', 'query')
            ->press('search')
            ->assertResponseOk()
            ->type('', 'query')
            ->press('search')
            ->assertResponseOk();
    }

    /**
     * @group SystemTest
     */
    public function testSearchRoute()
    {
        $this->visitRoute('search')
            ->assertResponseOk();
    }

    /**
     * @group SystemTest
     */
    public function testValidSearch()
    {
        $this->visitRoute('home')
            ->type('ios', 'query')
            ->press('search')
            ->assertResponseOk();
    }

    /**
     * @group SystemTest
     */
    public function testSearchFromBrowseWithoutInput()
    {
        $this->visitRoute('browse')
            ->type('', 'query')
            ->press('search')
            ->see('The query field is required.');
    }

    /**
     * @group SystemTest
     */
    public function testSearchFromBrowseWithInput()
    {
        $this->visitRoute('browse')
            ->type('ios', 'query')
            ->press('search')
            ->assertResponseOk();
    }

}