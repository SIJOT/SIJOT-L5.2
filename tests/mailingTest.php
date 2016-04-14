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
        Artisan::call('bouncer:seed');

        $user = factory(App\User::class)->create();
        $role = Bouncer::assign('active')->to($user);
        $this->assertTrue($role);

        $this->actingAs($user)->visit('mailing')->seeStatusCode(200);
    }

    /**
     * GET: mailing/insert
     *
     * @group all
     * @group mailing
     */
    public function testViewInsert()
    {
        Artisan::call('bouncer:seed');

        $user = factory(App\User::class)->create();
        $role = Bouncer::assign('active')->to($user);
        $this->assertTrue($role);

        $this->actingAs($user)->visit('mailing/insert')->seeStatusCode(200);
    }

    /**
     * GET: mailing/update/{id}
     *
     * @group all
     * @group mailing
     */
    public function testUpdateView()
    {
        Artisan::call('bouncer:seed');

        $user = factory(App\User::class)->create();
        $role = Bouncer::assign('active')->to($user);
        $this->assertTrue($role);

        $this->actingAs($user)->visit('mailing/update/1')->seeStatusCode(200);
    }

    /**
     * GET: mailing/mail/{id}
     *
     * @group all
     * @group mailing
     */
    public function testMailView()
    {
        Artisan::call('bouncer:seed');

        $user = factory(App\User::class)->create();
        $role = Bouncer::assign('active')->to($user);
        $this->assertTrue($role);

        $this->actingAs($user)->visit('mailing/mail/1')->seeStatusCode(200);
    }

    /**
     * GET: mailing/delete/{id}
     *
     * @group all
     * @group mailing
     */
    public function testDestroy()
    {
        Artisan::call('bouncer:seed');

        $user = factory(App\User::class)->create();
        $mail = factory(App\mailingUsers::class)->create(['id' => $user->id]);

        $role = Bouncer::assign('active')->to($user);
        $this->assertTrue($role);

        $this->actingAs($user)
            ->visit('mailing/delete/' . $mail->id)
            ->seeStatusCode(200)
            ->notSeeInDatabase('mailing_users', ['deleted_at' => null, 'id' => $mail->id]);
    }
}
