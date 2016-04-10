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
        $this->withoutMiddleware();

        $data['End_date']   = '24/01/2016';
        $data['Start_date'] = '22/01/2015';
        $data['Status']     = 0;
        $data['Group']      = 'group name';
        $data['Email']      = 'test@domain.org';
        $data['telephone']  = '0000/00.00.00';

        $this->post('rental/insert', $data)

            // Travis CI bug:
            // -------------------
            // Test say i got a 500 internal server error here.
            // But local all the tests. PASSED.
                
            ->seeStatusCode(302)
            ->seeInDatabase('rentals', $data);
    }
}
