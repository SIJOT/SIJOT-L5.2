<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BreakfastTest extends TestCase
{
    /**
     * GET: ontbijt
     *
     * @group all
     * @group breakfast
     */
    public function testBreakfastIndexFrontend()
    {
        $this->visit('ontbijt')->seeStatusCode(200);
    }
}
