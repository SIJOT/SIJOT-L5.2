<?php

namespace App\Http\Controllers;

use Fenos\Notifynder\Facades\Notifynder;
use Fenos\Notifynder\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class NotificationsController
 * @package App\Http\Controllers
 */
class NotificationsController extends Controller
{
    /**
     * NotificationsController constructor. 
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('activeAcl');
    }

    /**
     * Get the nofitications overview.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * @param  Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        if ($request->get('submit') === 'read') {
            Notification::whereIn('id', $request->get('notifications'))->update(['read' => 1]);
            $message = trans('flashSession.notificationRead');
            // auth()->user()->readAllNotifications();
        } elseif ($request->get('submit') === 'delete') {
            Notifynder::delete($request->get('notifications'));
            $message = trans('flashSession.notificationDel');
        }

        // TODO: set class flash message.
        session()->flash('message', $message);

        return redirect()->back(302);
    }
}
