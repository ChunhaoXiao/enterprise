<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Hash;
//use App\Models\Admin;

class LoginController extends Controller
{

	use AuthenticatesUsers;

	protected $redirectTo = '/admin';

	public function __construct()
	{
		$this->middleware('auth:admin')->only('showChangePassword', 'updatePassword', 'logout');
	}

    public function showLogin()
    {
    	return view('admin.login.login');
    }

    public function username()
    {
    	return 'username';
    }

    public function showChangePassword()
    {
    	return view('admin.login.change_password');
    }

    public function updatePassword(Request $request)
    {
    	$request->validate([
    		'oldpassword' => 'required',
    		'password' => 'required|min:6|max:20|confirmed',
    	]);
    	$user = Auth::user();
    	if(!Hash::check($request->oldpassword, $user->password))
    	{
    		return back()->withErrors('原密码错误');
    	}
    	$user->update(['password' => $request->password]);
    }

    public function logout()
    {
    	Auth::guard('admin')->logout();
    	return response()->json('success', 204);
    }

    protected function guard()
    {
    	return Auth::guard('admin');
    }
}
