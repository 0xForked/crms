<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
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
    public function basic(Request $request)
    {
        $request->validate(['name' => 'required']);

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
    public function password(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'new_password' => 'required|min:6|required_with:new_password_confirmation|same:new_password_confirmation',
            'new_password_confirmation' => 'min:6',
        ]);

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
