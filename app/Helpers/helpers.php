<?php

if (! function_exists('dashboard_url')) {
    function dashboard_url()
    {
        if (auth()->guard('admin')->check()) {
            return route('admin.dashboard');
        }

        if (auth()->guard('tutor')->check()) {
            return route('tutor.dashboard');
        }

        if (auth()->guard('parent')->check()) {
            return route('parent.dashboard');
        }

        if (auth()->guard('student')->check()) {
            return route('student.dashboard');
        }

        return url('/');
    }
}
