<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserControllerTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * Test user delete method.
     */
    public function testDestroyUser()
    {
        $user = factory(App\User::class)->make(['id' => 1]);

        $route = $this->actingAs($user);
        $route->visit('backend/users/delete/' . $user->id);
        $route->seeStatusCode(302);
    }
}
