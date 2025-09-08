<?php

namespace App\Http\Controllers\Tutor;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class NotificationController extends Controller
{
    public function index(): View
    {
        return view('tutor.notification');
    }

    public function markAllAsRead(): RedirectResponse
    {
        auth()->guard('tutor')->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }

    public function deleteAll(): RedirectResponse
    {
        auth()->guard('tutor')->user()->notifications()->delete();
        return redirect()->back();
    }

    public function delete(string $id): RedirectResponse
    {
        $notification = auth()->guard('tutor')->user()->notifications()->find($id);
        if ($notification) {
            $notification->forceDelete();
        }

        return redirect()->back();
    }
}
