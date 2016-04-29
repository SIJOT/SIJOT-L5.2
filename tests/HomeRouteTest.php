<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeRouteTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;
    /**
     * Test the front-end home url. 
     *
     * @group all 
     * @group backend
     */
    public function testFrontendHome()
    {
        $this->visit('/')->seeStatusCode(200);
    }

    /**
     * Test the home route for the backend.
     * 
     * @group all 
     * @group backend
     */
    public function testBackendHome()
    {
        $user = factory(App\User::class)->create();
        
        $route = $this->actingAs($user);
        $route->visit('/home');
        $route->seeStatusCode(200);
    }
}
