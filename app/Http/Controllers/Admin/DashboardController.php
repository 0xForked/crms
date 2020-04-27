<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function generals()
    {
        return view('admin.dashboard.general');
    }

    public function analytics()
    {
        return view('admin.dashboard.analytic');
    }

    public function transactions()
    {
        return view('admin.dashboard.transactions');
    }

}
