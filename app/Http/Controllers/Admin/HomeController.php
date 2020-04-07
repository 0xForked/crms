<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function generals()
    {
        return view('admin.general');
    }

    public function analytics()
    {
        return view('admin.analytic');
    }

}
