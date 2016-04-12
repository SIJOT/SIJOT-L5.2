<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Artisan;

class NotificationTest extends TestCase
{
    use DatabaseTransactions, DatabaseMigrations;

    /**
     * GET: notifications
     *
     * @group all
     * @group notification
     */
    public function testNotificationView()
    {
        $user = factory(App\User::class)->create();

        Artisan::call('bouncer:seed');

        $role    = Bouncer::assign('admin')->to($user);
        $active  = Bouncer::assign('active')->to($user);

        $this->assertTrue($role);
        $this->assertTrue($active);

        $this->actingAs($user)
            ->visit('notifications')
            ->seeStatusCode(200);
    }
}
