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
     * @group notifications
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

    /**
     * POST: notifications/update
     *
     * @group all
     * @group notification
     */
    public function testNotificationUpdate()
    {
        $this->withoutMiddleware();
        Artisan::call('bouncer:seed');

        $user          = factory(App\User::class)->create();
        $notification = factory(Fenos\Notifynder\Models\Notification::class, 2)->create();

        $role   = Bouncer::assign('admin')->to($user);
        $active = Bouncer::assign('active')->to($user);

        $this->assertTrue($role);
        $this->assertTrue($active);

        $data1['submit']   = 'read';
        $data2['submit']   = 'delete';

        $data1['notifications'] = ['0' => $notification[0]->id];
        $data2['notifications'] = ['1' => $notification[1]->id];

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->post('notifications/update', $data1)
            ->seeStatusCode(302);

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->post('notifications/update', $data2)
            ->seeStatusCode(302);
    }
}
