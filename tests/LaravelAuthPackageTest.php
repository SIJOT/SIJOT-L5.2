<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LaravelAuthPackageTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * GET: register
     *
     * @group all
     * @group auth
     */
    public function testAuthRegister()
    {
        $this->visit('register')->seeStatusCode(200);
    }

    /**
     * POST: register
     *
     * @group all
     * @group auth
     */
    public function testAuthRegisterPost()
    {
       // TODO: write test
    }

    /**
     * GET: logout
     *
     * @group all
     * @group auth
     */
    public function testAuthLogout()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('logout')
            ->dontSeeIsAuthenticated()
            ->seeStatusCode(200);
    }

    /**
     * POST: login
     *
     * @group all
     * @group auth
     */
    public function testAuthLoginPost()
    {
        $this->withoutMiddleware();
        $user = factory(App\User::class)->create();

        $data['email']    = $user->email;
        $data['password'] = $user->password;

        $this->post('login', $data)
            ->seeStatusCode(302)
            ->isAuthenticated();
    }

    /**
     * GET: login
     *
     * @group all
     * @group auth
     */
    public function testAuthLoginGet()
    {
        $this->visit('login')->seeStatusCode(200);
    }

    /**
     * POST: password/email
     *
     * @group all
     * @group auth
     */
    public function testPasswordEmailPost()
    {
        config(['mail.driver' => 'log']);
        $user = factory(App\User::class)->create();

        $this->post('password/email', ['email' => $user->email])
            ->seeStatusCode(302);
    }

    /**
     * GET: password/reset
     *
     * @group all
     * @group auth
     */
    public function testAuthPasswordEmail()
    {
        $this->visit('password/reset')->seeStatusCode(200);
    }

    /**
     * GET: password/reset/{token?}
     *
     * @group all
     * @group auth
     */
    public function testPasswordToken()
    {
        // TODO: write test
    }
}
