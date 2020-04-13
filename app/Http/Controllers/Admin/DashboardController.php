<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    public function incomes()
    {
        return view('admin.dashboard.incomes');
    }

}
