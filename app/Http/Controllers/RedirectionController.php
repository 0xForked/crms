<?php

namespace App\Http\Controllers;

class RedirectionController extends Controller
{
    /**
     * Redirection page for clean route on cache.
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function login()
    {
        return redirect('login');
    }

    /**
     * Redirection page for clean route on cache.
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function dashboard()
    {
        return redirect('/dashboard/generals');
    }
}
