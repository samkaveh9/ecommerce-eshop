<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{

    public function index()
    {
        return view('dashboard.admin.index');
    }

    public function changePasswordIndex()
    {
        return view('auth.password-change');
    }


    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'oldpassword' => 'required|min:8',
            'password' => 'required|confirmed|min:8',
        ]);

        $hashedPassword = Auth::user()->password;

        if (auth()->check()) {
            if (Hash::check($request->oldpassword, $hashedPassword)) {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();
                return redirect(route('login'))->with('changePassword', 'رمز عبور با موفقیت تغییر کرد');
            }
        }
        return redirect()->back()->with('errChangePassword', 'رمز جاری به درستی وارد نشده!');
    }


}
