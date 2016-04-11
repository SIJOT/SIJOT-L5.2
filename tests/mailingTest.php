<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Artisan;

class mailingTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * GET: mailing
     *
     * @group all
     * @group mailing
     */
    public function testIndex()
    {
        config(['mail.driver' => 'log']);
        Artisan::call('bouncer:seed');

        $user = factory(App\User::class)->create();
        $role = Bouncer::assign('active')->to($user);
        $this->assertTrue($role);

        $this->actingAs($user)->visit('mailing')->seeStatusCode(200);
    }
}
