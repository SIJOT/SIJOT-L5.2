<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TakkenBackEndTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * POST: backend/groups/update/{id}
     *
     * @group all
     * @group groups
     */
    public function testUpdateMethod()
    {
        // $this->withoutMiddleware();
        Artisan::call('bouncer:seed');

        $user  = factory(App\User::class)->create();
        $group = factory(App\Group::class)->create();
        $Ncat  = factory(Fenos\Notifynder\Models\NotificationCategory::class)->create([
            'name' => 'group.edit',
            'text' => 'group updated',
        ]);

        $role = Bouncer::assign('active')->to($user);
        $this->assertTrue($role);

        $data['id']          = $group->id;
        $data['Uri']         = $group->Uri;
        $data['title']       = 'Title';
        $data['sub_title']   = 'Sub title';
        $data['description'] = 'Description';

        $this->actingAs($user)
            ->seeIsAuthenticated()
            ->post('backend/groups/update/' . $group->id, $data)
            ->seeStatusCode(302)
            ->seeInDatabase('groups', $data);

    }

    /**
     * POST: backend/groups/view
     *
     * @group all
     * @group groups
     */
    public function testUpdate()
    {
        Artisan::call('bouncer:seed');
        $user = factory(App\User::class)->create();

        $active = Bouncer::assign('active')->to($user);
        $role   = Bouncer::assign('kapoenen')->to($user);

        $this->assertTrue($active);
        $this->assertTrue($role);

        $this->visit('backend/groups/view')->seeStatusCode(200);
    }
}
