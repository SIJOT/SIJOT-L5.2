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

    }

    /**
     * POST: register
     *
     * @group all
     * @group auth
     */
    public function testAuthRegisterPost()
    {

    }

    /**
     * GET: logout
     *
     * @group all
     * @group auth
     */
    public function testAuthLogout()
    {

    }

    /**
     * POST: login
     *
     * @group all
     * @group auth
     */
    public function testAuthLoginPost()
    {

    }

    /**
     * GET: login
     *
     * @group all
     * @group auth
     */
    public function testAuthLoginGet()
    {

    }

    /**
     * POST: password/email
     *
     * @group all
     * @group auth
     */
    public function testPasswordEmailPost()
    {
        
    }

    /**
     * POST: password/reset
     *
     * @group all
     * @group auth
     */
    public function testAuthPasswordEmail()
    {

    }

    /**
     * GET: password/reset/{token?}
     *
     * @group all
     * @group auth
     */
    public function testPasswordToken()
    {

    }
}
