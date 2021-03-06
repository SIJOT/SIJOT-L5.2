<?php

namespace App\Http\Controllers;

use App\Rental;
use App\Http\Requests;
use App\User;
use Fenos\Notifynder\Facades\Notifynder;
use Illuminate\Support\Facades\Validator;
use League\Fractal\Manager;
use Illuminate\Http\Request;
use League\Fractal\Pagination\Cursor;
use League\Fractal\Resource\Collection;
use Symfony\Component\HttpFoundation\Response as Status;

/**
 * Class rentalApiController
 *
 * @category Controllers
 * @package  SIJOT_Website
 * @author   Tim Joosten <Topairy@gmail.com>
 */
class rentalApiController extends Controller
{
    // TODO: [v1.0.0] #114 Add notifications for the backend.

    /**
     * RentalApiController constructor
     */
    public function construct()
    {
        // This shit is not a love song.
        // Warning dragons below.
    }

    /**
     * API - Get all the rentals in the system.
     *
     * @param  Request $request, the input closure
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fractal = new Manager();

        if ($currentCursorStr = $request->input('cursor', false)) {
            $rentals = Rental::where('id', '>', $currentCursorStr)->take(5)->get();
        } else {
            $rentals = Rental::take(5)->get();
        }

        if (count($rentals) > 0) {
            $prevCursorStr = $request->input('prevCursor', 6);
            $newCursorStr  = $rentals->last()->id;

            $cursor   = new Cursor($currentCursorStr, $prevCursorStr, $newCursorStr, $rentals->count());
            $resource = new Collection($rentals, $this->parser());
            $resource->setCursor($cursor);

            $content = $fractal->createData($resource)->toJson();
            $status  = Status::HTTP_OK;
        } elseif (count($rentals) === 0) {
            $content = ['message' => 'Er zijn geen verhuringen'];
            $status  = Status::HTTP_OK;
        }

        return response($content, $status)->header('Content-Type', 'application/json');
    }

    /**
     * API - Delete a rental out off the system.
     *
     * @param  int, $id, the ide in the rental system.
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $rental = Rental::find($id);

        if (count($rental) > 0) {
            $rental->delete();
        }

        switch(count($rental)) {
            case '1':
                $status  = Status::HTTP_OK;
                $content = ['message' => 'rental deleted'];
                break;

            case '0':
                $status  = Status::HTTP_BAD_REQUEST;
                $content = ['message' => 'could not perform this action'];
                break;
        }

        $response = response($content, $status); 
        $response->header('Content-Type', 'application/json');
        
        return $response;
    }

    /**
     * API - Insert new rental into the system.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Start_datum' => 'required',
            'Eind_datum'  => 'required',
            'Status'      => 'required',
            'Email'       => 'required',
            'telephone'   => 'required',
            'Group'       => 'required'
        ]);


        if (! $validator->fails()) {
            // TODO: check for mass assign.
            $rental             = new Rental;
            $rental->Start_date = $request->get('Start_datum');
            $rental->End_date   = $request->get('Eind_datum');
            $rental->Status     = $request->get('Status');
            $rental->Email      = $request->get('Email');
            $rental->Group      = $request->get('Group');
            $rental->telephone  = $request->get('telephone');
            $rental->save();

            if ($rental->count() === 0) {
                $status = Status::HTTP_BAD_REQUEST;
                $content = ['message' => 'could not perform the action.'];
            } elseif ($rental->count() > 0) {
                $status = Status::HTTP_OK;
                $content = ['message' => 'Rental successfull added'];
            }
        } else {
            $status = Status::HTTP_BAD_REQUEST;
            $content = [
                'message'      => 'Validation errors',
                'http_status'  => $status,
                'errors'       => $validator->errors()->all()
            ];
        }

        $response = response($content, $status); 
        $response->header('Content-Type', 'application/json');

        return $response;
    }

    /**
     * API - Update a rental.
     *
     * @param  Request $request, the input.
     * @param  int, $id, the id off the rental in the data table.
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'Start_datum' => 'required',
            'Eind_datum'  => 'required',
            'Status'      => 'required',
            'Email'       => 'required',
            'telephone'   => 'required'
        ]);


        if (! $validator->fails()) {
            // TODO: check for mass assign.
            $rental             = Rental::find($id);
            $rental->Start_date = $request->get('Start_datum');
            $rental->End_date   = $request->get('Eind_datum');
            $rental->Status     = $request->get('Status');
            $rental->Email      = $request->get('Email');
            $rental->telephone  = $request->get('telephone');
            $rental->save();

            if ($rental->count() === 0) {
                // TODO: phpunit -> this section of the if/else needs testing.
                $status = Status::HTTP_BAD_REQUEST;
                $content = ['message' => 'could not perform the action.'];
            } elseif ($rental->count() > 0) {
                $status = Status::HTTP_OK;
                $content = ['message' => 'Rental successfull updated'];
            }
        } else {
            $status = Status::HTTP_BAD_REQUEST;
            $content = [
                'message'      => 'Validation errors',
                'http_status'  => $status,
                'errors'       => $validator->errors()->all()
            ];
        }
        
        $response = response($content, $status);
        $response->jeader('Content-Type', 'application/json');

        return $response;
    }

    /**
     * API - Display a specific rental in the AI and system.
     *
     * @param  int $id, the id in the data table.
     * @return \Illuminate\Http\Response
     */
    public function specific($id)
    {
        // TODO: needs phpunit test.
        $fractal = new Manager();

        // ERROR data.
        $data['error']   = true;
        $data['message'] = 'No rental found.';

        // SUCCESS data.
        $rental = Rental::find($id);
        $result = new Collection($rental, $this->parser());

        if (count($rental) === 0) {
            $content = $data;
        } else {
            $content = $fractal->createData($result)->toJson();
        }

        return response($content, Status::HTTP_OK)->header('Content-Type', 'application/json');
    }

    /**
     * API - Parser output.
     *
     * @return \Closure
     */
    public function parser()
    {
        /**
         * API - Anonymous parser function.
         *
         * @param  array , $data, collection, database output.
         * @return array, the data structure off the AI.
         */
        return function ($data) {
            return [
                'id'          => (int)    $data['id'],
                'start_datum' => (string) $data['Start_date'],
                'eind_datum'  => (string) $data['End_date'],
                'status'      => (int)    $data['Status'],
                'groep'       => (string) $data['Groep'],
                'email'       => (string) $data['telephone'],
            ];
        };
    }
}
