<?php

namespace App\Http\Controllers;

use Fenos\Notifynder\Facades\Notifynder;
use Illuminate\Http\Request;
use App\Http\Requests;

class NotificationsController extends Controller
{
    /**
     * NotificationsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get the nofitications overview.
     *
     * @return mixed
     */
    public function index()
    {
        $user = auth()->user();
        $data['notifications'] = $user->getNotificationsNotRead($paginate = 15, $order = 'desc');

        return view('backend.notifications.notification', $data);
    }

    /**
     * Destroy the read notification.
     *
     * @param Request $request
     */
    public function update(Request $request)
    {
        if ($request->submit === 'read') {
            // TODO: insert set to read logic.
            
            $message = 'U hebt de notificaties gelezen.';
            // auth()->user()->readAllNotifications();
        } elseif ($request->submit === 'delete') {
            Notifynder::delete($request->get('notifications'));
            $message = 'U hebt notificaties verwijderd.';
        }

        session()->flash('message', $message);
        return redirect()->back(302);
    }
}
