<?php

namespace App\Http\Controllers\Tutor;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        return view('tutor.index');
    }
}
