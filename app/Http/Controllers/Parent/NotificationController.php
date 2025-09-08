<?php

namespace App\Http\Controllers\Parent;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class NotificationController extends Controller
{
    public function index(): View
    {
        return view('parent.notification');
    }

    public function markAllAsRead(): RedirectResponse
    {
        auth()->guard('parent')->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }

    public function deleteAll(): RedirectResponse
    {
        auth()->guard('parent')->user()->notifications()->delete();
        return redirect()->back();
    }

    public function delete(string $id): RedirectResponse
    {
        $notification = auth()->guard('parent')->user()->notifications()->find($id);
        if ($notification) {
            $notification->forceDelete();
        }

        return redirect()->back();
    }
}
