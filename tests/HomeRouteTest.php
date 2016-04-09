<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeRouteTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testFrontendHome()
    {
        $this->visit('/')->seeStatusCode(200);
    }

    public function testBackendHome()
    {
        $user = factory(App\User::class)->create();
    }
}
