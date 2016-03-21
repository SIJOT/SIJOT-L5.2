<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class NotificationsController extends Controller
{
    public function index()
    {
        $test = auth()->user()->getNotificationsNotRead($paginate = 15, $order = 'desc');

        foreach($test as $data)
        {
            echo $data->text;
        }
    }
}
