<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Artisan;

class RentalBackEndTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * GET: backend/rental/insert
     *
     * @group all
     * @group rental
     */
    public function testRentalInsertView()
    {
        $user = factory(App\User::class)->create();

        Artisan::call('bouncer:seed');
        $role = Bouncer::assign('admin')->to($user);
        $this->assertTrue($role);

        $this->actingAs($user)
            ->visit('backend/rental/insert')
            ->seeStatusCode(200);
    }

    /**
     * GET: backend/rental/overview/all
     * GET: backend/rental/overview/new
     * GET: backend/rental/overview/option
     *
     * @group all
     * @group rental
     */
    public function testOverview()
    {
        $user = factory(App\User::class)->create();

        Artisan::call('bouncer:seed');
        $role = Bouncer::assign('verhuur')->to($user);
        $this->assertTrue($role);

        $new = $this->actingAs($user);
        $new->visit('backend/rental/overview/all');
        $new->seeStatusCode(200);

        $all = $this->actingAs($user);
        $all->visit('backend/rental/overview/new');
        $all->seeStatusCode(200);

        $option = $this->actingAs($user);
        $option->visit('backend/rental/overview/option');
        $option->seeStatusCode(200);
    }

    /**
     * GET: backend/rental/destroy/{id}
     *
     * @group all
     * @group rental
     */
    public function testDestroy()
    {
        $user = factory(App\User::class)->create();
        $rent = factory(App\Rental::class)->create();

        Artisan::call('bouncer:seed');
        $role = Bouncer::assign('verhuur')->to($user);
        $this->assertTrue($role);

        $this->actingAs($user)
            ->visit('backend/rental/destroy/' . $rent->id)
            ->seeStatusCode(200)
            ->notSeeInDatabase('rentals', ['deleted_at' => null, 'id' => $rent->id]);
    }

    /**
     * GET: backend/rental/option/{id}
     *
     * @group all
     * @group rental
     */
    public function testOption()
    {
        $rent = factory(App\Rental::class)->create(['Status' => 0]);
        $user = factory(App\User::class)->create();

        Artisan::call('bouncer:seed');
        $role = Bouncer::assign('verhuur')->to($user);
        $this->assertTrue($role);

        $notDb['Status'] = $rent->Status;
        $notDb['id']     = $rent->id;

        $Db['Status']    = 1;
        $Db['id']        = $rent->id;

        $this->actingAs($user)
            ->visit('backend/rental/option/'. $rent->id)
            ->seeStatusCode(200)
            ->seeInDatabase('rentals', $Db)
            ->notSeeInDatabase('rentals', $notDb);
    }

    /**
     * GET: backend/rental/confirm/{id}
     *
     * @group all
     * @group rental
     */
    public function testConfirm()
    {
        $rent = factory(App\Rental::class)->create(['Status' => 0]);
        $user = factory(App\User::class)->create();

        Artisan::call('bouncer:seed');
        $role = Bouncer::assign('verhuur')->to($user);
        $this->assertTrue($role);

        $notDb['Status'] = $rent->Status;
        $notDb['id']     = $rent->id;

        $Db['Status']    = 2;
        $Db['id']        = $rent->id;

        $this->actingAs($user)
            ->visit('backend/rental/confirm/'. $rent->id)
            ->seeStatusCode(200)
            ->seeInDatabase('rentals', $Db)
            ->notSeeInDatabase('rentals', $notDb);
    }

    /**
     * GET: backend/rental/download
     *
     * @group all
     * @group rental
     */
    public function testDownload()
    {
        $user = factory(App\User::class)->create();

        Artisan::call('bouncer:seed');
        $role = Bouncer::assign('verhuur')->to($user);
        $this->assertTrue($role);

        $this->actingAs($user)->visit('backend/rental/download');
    }
}
