<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateBasicProfileRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{

    /**
     * Display the specified user data.
     *
     * @param User id
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = User::findOrFail(auth()->id());

        return view('admin.accounts.index', compact('user'));
    }

    /**
     * Update the user basic data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param User id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function basic(UpdateBasicProfileRequest $request)
    {
        $user = User::findOrFail(auth()->id());
        $user->name = $request->name;
        $user->save();

        return redirect()->back()->with(
            'success',
            'Basic Information updated successfully!'
        );
    }

    /**
     * Update the user password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param User id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(UpdatePasswordRequest $request)
    {
        $user = User::findOrFail(auth()->id());

        if(!password_verify($request->password, $user->password)) {
            return redirect()->back()->with(
                'error',
                'Failed update password, old password does not match!'
            );
        }

        $user->password = Hash::make($request->get('new_password'));
        $user->save();

        return redirect()->back()->with(
            'success',
            'Password updated successfully!'
        );
    }

}
