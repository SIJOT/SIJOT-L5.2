<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Artisan;

class RentalApiTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * Test a new rental insert through the API.
     *
     * @group rental
     * @group api
     */
    public function testInsertUrlWithNoErrors()
    {
        $user = factory(App\User::class)->create();

        // Permission
        Artisan::call('bouncer:seed');
        Bouncer::assign('verhuur')->to($user);

        // Input data:
        $input['Start_datum'] = '11/04/2016';
        $input['Eind_datum']  = '15/04/2016';
        $input['Status']      = 1;
        $input['Group']       = 'Water dei mesen';
        $input['Email']       = 'example@domain.be';
        $input['telephone']   = '0000/00.00.00';


        // Test rentals table
        $rental['Start_date'] = $input['Start_datum'];
        $rental['End_date']   = $input['Eind_datum'];
        $rental['Status']     = $input['Status'];
        $rental['Email']      = $input['Email'];
        $rental['telephone']  = $input['telephone'];

        // without validation errors
        $this->post('api/v1/rental/create?api_token=' . $user->api_token, $input)
            ->seeStatusCode(200)
            ->seeInDatabase('rentals', $rental)
            ->seeJsonEquals(['message' => 'Rental successfull added']);

        // with validation errors
        $validation['message']     = 'Validation errors';
        $validation['http_status'] = 400;
        $validation['errors'] = [
            "The start datum field is required.",
            "The eind datum field is required.",
            "The status field is required.",
            "The email field is required.",
            "The telephone field is required.",
            "The group field is required."
        ];

        $this->post('api/v1/rental/create?api_token=' . $user->api_token, [])
            ->seeStatusCode(400)
            ->seeJson($validation);
    }

    /**
     * Test to get all the rentals through the API.
     *
     * @group rental
     * @group api
     */
    public function testGetAllRentalsUrl()
    {
        $user   = factory(App\User::class)->create();
        $rental = factory(App\Rental::class)->create();

        $rentalDB['id']         = $rental->id;
        $rentalDB['Start_date'] = $rental->Start_date;
        $rentalDB['End_date']   = $rental->End_date;
        $rentalDB['Status']     = $rental->Status;
        $rentalDB['Email']      = $rental->Email;
        $rentalDB['telephone']  = $rental->telephone;

        $jsonData['id'] = $rental->id;
        $jsonData['start_datum'] = $rental->Start_date;
        $jsonData['eind_datum']  = $rental->End_date;
        $jsonData['status']      = $rental->Status;

        $this->visit('api/v1/rental?api_token=' . $user->api_token)
            ->seeStatusCode(200)
            ->seeInDatabase('rentals', $rentalDB)
            ->seeJson($jsonData);
    }

    /**
     * Test to get the null rows response - API
     *
     * @group api
     * @group rental
     */
    public function testGetAllRentalsUrlError()
    {
        $user = factory(App\User::class)->create();


        $this->visit('api/v1/rental?api_token=' . $user->api_token)
            ->seeStatusCode(200)
            ->seeJson(['message' => 'Er zijn geen verhuringen']);
    }

    /**
     * Test delete method with no errors - rental API
     *
     * @group api
     * @group rental
     */
    public function testDeleteNoErrors()
    {
        $user = factory(App\User::class)->create();
        $rent = factory(App\Rental::class)->create();

        $this->delete('api/v1/rental/' . $rent->id .'?api_token=' . $user->api_token)
            ->seeStatusCode(200)
            ->seeJson(['message' => 'rental deleted']);
    }

    /**
     * Test delete method with errors - rental API
     *
     * @group api
     * @group rental
     */
    public function testDeleteErrors()
    {
        $user = factory(App\User::class)->create();

        $this->delete('api/v1/rental/00014?api_token=' . $user->api_token)
            ->seeStatusCode(400)
            ->seeJson(['message' => 'could not perform this action']);
    }

    /**
     * Test a new rental insert through the API.
     *
     * @group rental
     * @group api
     */
    public function testEditUrlWithNoErrors()
    {
        $rent = factory(App\Rental::class)->create();
        $user = factory(App\User::class)->create();

        // Permission
        Artisan::call('bouncer:seed');
        Bouncer::assign('verhuur')->to($user);

        // Input data:
        $input['Start_datum'] = '11/04/2016';
        $input['Eind_datum']  = '15/04/2016';
        $input['Status']      = 1;
        $input['Group']       = 'Water dei mesen';
        $input['Email']       = 'example@domain.be';
        $input['telephone']   = '0000/00.00.00';


        // Test rentals table
        $rental['Start_date'] = $input['Start_datum'];
        $rental['End_date']   = $input['Eind_datum'];
        $rental['Status']     = $input['Status'];
        $rental['Email']      = $input['Email'];
        $rental['telephone']  = $input['telephone'];

        // without validation errors
        $this->put('api/v1/rental/' . $rent->id . '?api_token=' . $user->api_token, $input)
            ->seeStatusCode(200)
            ->seeInDatabase('rentals', $rental)
            ->seeJsonEquals(['message' => 'Rental successfull updated']);

        // with validation errors
        $validation['message']     = 'Validation errors';
        $validation['http_status'] = 400;

        $this->put('api/v1/rental/00145?api_token=' . $user->api_token, [])
            ->seeStatusCode(400)
            ->seeJson($validation);
    }

    /**
     * Get a specific item without errors - rental API
     *
     * @group api
     * @group rental
     */
    public function testSpecificNoErrors()
    {
        $user = factory(App\User::class)->create();
        $rent = factory(App\Rental::class)->create();

        $jsonData['id']          = $rent->id;
        $jsonData['start_datum'] = $rent->Start_date;
        $jsonData['eind_datum']  = $rent->End_date;
        $jsonData['status']      = $rent->Status;

        $this->visit('api/v1/rental/' . $rent->id . '?api_token' . $user->api_token)
            ->seeStatusCode(200);
            // ->seeJson($jsonData);
    }

    /**
     * Get a specific item with errors - rental API
     *
     * @group api
     * @group rental
     */
    public function testSpecificWithErrors()
    {
        $user = factory(App\User::class)->create();

        // $data['message'] = 'No rental found.';

        $this->visit('api/v1/rental/0014?api_token' . $user->api_token)
            ->seeStatusCode(200);
            // ->seeJson($data);
    }
}
