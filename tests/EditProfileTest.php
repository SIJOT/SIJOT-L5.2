<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Artisan;

class EditProfileTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * GET: Profile/edip
     *
     * @group all
     * @group auth
     */
    public function testEditView()
    {
        Artisan::call('bouncer:seed');

        $user = factory(App\User::class)->create();
        $role = Bouncer::assign('active')->to($user);

        $this->assertTrue($role);
        $this->actingAs($user)
            ->visit('profile/edit')
            ->seeStatusCode(200);

    }
}
