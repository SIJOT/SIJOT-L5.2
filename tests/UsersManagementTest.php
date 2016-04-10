<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Artisan;

class UsersManagementTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * GET: backend/users/insert
     *
     * @group all
     * @group users
     */
    public function testInsertView()
    {
        $user = factory(App\User::class)->create();

        Artisan::call('bouncer:seed');

        $route = $this->actingAs($user);

        Bouncer::assign('admin')->to(auth()->user());
        Bouncer::assign('active')->to(auth()->user());

        $this->assertTrue(auth()->user()->is('admin'));
        $this->assertTrue(auth()->user()->is('active'));

        $route->visit('backend/users/insert');
        $route->seeStatusCode(200);
    }

    /**
     * POST: backend/users/store
     *
     * - without errors
     *
     * @group all
     * @group users
     */
    public function testStoreNewUserWithOutErrors()
    {
        $user = factory(App\User::class)->create();

        Artisan::call('bouncer:seed');
        $role = Bouncer::assign('admin')->to($user);
        $this->assertTrue($role);

    }

    /**
     * POST: backend/users/store
     *
     * - with errors
     *
     * @group all
     * @group users
     */
    public function testStoreNewUserWithErrors()
    {
        $user = factory(App\User::class)->create();

        Artisan::call('bouncer:seed');
        $role = Bouncer::assign('admin')->to($user);
        $this->assertTrue($role);

        $this->visit('backend/users/overview')
            ->seeStatusCode(200);

    }

    /**
     * GET: backend/users/overview
     *
     * @group all
     * @group users
     */
    public function testUsersOverview()
    {
        $user = factory(App\User::class)->create();

        Artisan::call('bouncer:seed');
        $role = Bouncer::assign('admin')->to($user);
        $this->assertTrue($role);
    }

    /**
     * GET: backend/users/block/{id}
     *
     * @group all
     * @group users
     */
    public function testUsersBlock()
    {
        $user = factory(App\User::class)->create();

        Artisan::call('bouncer:seed');
        $role = Bouncer::assign('admin')->to($user);
        $this->assertTrue($role);
    }

    /**
     * GET: backend/users/unblock/{id}
     *
     * @group all
     * @group users
     */
    public function testUsersUnblock()
    {
        $user = factory(App\User::class, 2)->create();

        Artisan::call('bouncer:seed');
        $role  = Bouncer::assign('admin')->to($user[0]);
        $state = Bouncer::assign('blocked')->to($user[0]);

        // Check roles - BEFORE update.
        $this->assertTrue($role);
        $this->assertTrue($state);

        $this->actingAs($user[1])
            ->visit('backend/users/unblock/' . $user[0]->id)
            ->seeStatusCode(200);

        // Check roles - AFTER update.
        $this->assertTrue($user[0]->is('active'));


    }

    /**
     * GET: backend/users/delete/{id}
     *
     * @group all
     * @group users
     */
    public function testDelete()
    {
        $user = factory(App\User::class, 2)->create();

        Artisan::call('bouncer:seed');

        $notDb['deleted_at'] = null;
        $notDb['id']         = $user[1]->id;

        $route = $this->actingAs($user[0]);

        Bouncer::assign('admin')->to(auth()->user());
        Bouncer::assign('active')->to(auth()->user());

        $this->assertTrue(auth()->user()->is('admin'));
        $this->assertTrue(auth()->user()->is('active'));

        $route->visit('backend/users/delete/' . $user[1]->id);
        $route->seeStatusCode(200);
        $route->notSeeInDatabase('users', $notDb);
    }
}
