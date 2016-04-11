<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RentalFrontEndTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;
    /**
     * GET: verhuur
     *
     * @group all
     * @group rental
     */
    public function testFrontEndIndex()
    {
        $this->visit('verhuur')->seeStatusCode(200);
    }

    /**
     * GET: verhuur/aanvraag
     *
     * @group all
     * @group rental
     */
    public function testRentalRequest()
    {
        $this->visit('verhuur/aanvraag')->seeStatusCode(200);
    }

    /**
     * GET: verhuur/kalender
     *
     * @group all
     * @group rental
     */
    public function testRentalCalendar()
    {
        $this->visit('verhuur/kalender')->seeStatusCode(200);
    }

    /**
     * GET: verhuur/bereikbaarheid
     *
     * @group all
     * @group rental
     */
    public function testRentalBereik()
    {
        $this->visit('verhuur/bereikbaarheid')->seeStatusCode(200);
    }

    /**
     * POST: rental/insert
     *
     * @group all
     * @group rental
     */
    public function testRentalInsert()
    {
        config(['mail.driver' => 'log']);
        $this->withoutMiddleware();

        $data['End_date']   = '24/01/2016';
        $data['Start_date'] = '22/01/2015';
        $data['Status']     = 0;
        $data['Group']      = 'group name';
        $data['Email']      = 'test@domain.org';
        $data['telephone']  = '0000/00.00.00';

        $this->post('rental/insert', $data)
            ->seeStatusCode(302)
            ->seeInDatabase('rentals', $data);
    }

    /**
     * POST: rental/insert
     *
     * @group all
     * @group rental
     */
    public function testRentalInsertAuth()
    {
        config(['mail.driver' => 'log']);
        $this->withoutMiddleware();

        $user = factory(App\User::class)->create();
        $Ncat = factory(Fenos\Notifynder\Models\NotificationCategory::class)->create([
            'name' => 'rental.insert',
            'text' => 'the notification message',
        ]);

        $role = Bouncer::assign('active')->to($user);
        $rent = Bouncer::assign('verhuur')->to($user);

        $this->assertTrue($role);
        $this->assertTrue($rent);

        $data['End_date']   = '24/01/2016';
        $data['Start_date'] = '22/01/2015';
        $data['Status']     = 0;
        $data['Group']      = 'group name';
        $data['Email']      = 'test@domain.org';
        $data['telephone']  = '0000/00.00.00';

        $this->actingAs($user)
            ->post('rental/insert', $data)
            ->seeStatusCode(302)
            ->seeInDatabase('rentals', $data);
    }
}
