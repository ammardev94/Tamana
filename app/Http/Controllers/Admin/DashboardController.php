<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\Team;
use App\Models\Service;
use App\Models\Portfolio;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        $news = News::count();
        $portfolios = Portfolio::count();
        $teams = Team::count();
        $services = Service::count();

        $dashboardCounts = [
            "news"          => $news,
            "portfolios"    => $portfolios,
            "teams"         => $teams,
            "services"      => $services
        ];

        return view('admin.index', $dashboardCounts);
    }
}
