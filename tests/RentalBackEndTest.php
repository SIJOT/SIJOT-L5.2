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
        $role   = Bouncer::assign('verhuur')->to($user);
        $active = Bouncer::assign('active')->to($user);

        $this->assertTrue($role);
        $this->assertTrue($active);

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

    /**
     * GET: backend/rental/edit/{id}
     *
     * @group all
     * @group rental
     */
    public function rentalEditView()
    {
        Artisan::call('bouncer:seed');

        $user = factory(App\User::class)->create();
        $rent = factory(App\Rental::class)->create();

        $role   = Bouncer::assign('verhuur')->to($user);
        $active = Bouncer::assign('active')->to($user);

        $this->assertTrue($role);
        $this->assertTrue($active);

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->visit('backend/rental/edit/' . $rent->id)
            ->seeStatusCode(200);
    }

    /**
     * POST: backend/rental/update/{id}
     *
     * @group all
     * @group rental
     */
    public function testUpdate()
    {
        $this->withoutMiddleware();
        Artisan::call('bouncer:seed');

        $user         = factory(App\User::class)->create();
        $rental       = factory(App\Rental::class)->create();
        $notification = factory(Fenos\Notifynder\Models\NotificationCategory::class)->create([
            'name' => 'rental.edit',
            'text' => '{from.name} heeft een verhuur gewijzigd.'
        ]);

        $role   = Bouncer::assign('verhuur')->to($user);
        $active = Bouncer::assign('active')->to($user);

        $this->assertTrue($role);
        $this->assertTrue($active);

        $message['name'] = $notification->name;
        $message['text'] = $notification->text;

        $oldInput['Start_date'] = $rental->Start_date;
        $oldInput['End_date']   = $rental->End_date;
        $oldInput['Status']     = $rental->Status;
        $oldInput['Email']      = $rental->Email;
        $oldInput['telephone']  = $rental->telephone;

        $newInput['Start_date'] = '00/00/2000';
        $newInput['End_date']   = '01/01/2222';
        $newInput['Status']     = 1;
        $newInput['Email']      = 'example@example.tld';
        $newInput['telephone']  = '1111/11.11.11';

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->seeInDatabase('notification_categories', $message)
            ->seeInDatabase('rentals', $oldInput)
            ->post('backend/rental/update/' . $rental->id, $newInput)
            ->seeStatusCode(302);
    }
}
