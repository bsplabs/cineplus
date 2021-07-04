<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class CustomAuthController extends Controller
{
    // use AuthenticatesUsers;

    // protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('pages.login');
    }

    public function customLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                'code' => 2
            ]);
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return response()->json([
                'status' => 'success',
                'code' => 0
            ]);
            // return redirect()->intended('/')->withSuccess('signed in');
        } else {
            return response()->json([
                'status' => 'fail',
                'code' => 1
            ]);
        }
        // return redirect('/login')->withErrors('เข้าสู่ระบบไม่สำเร็จ');
    }

    public function register()
    {
        return view('pages.register');
    }

    public function customRegisteration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                'code' => 2
            ]);
        }

        $user = array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        );
        if (User::create($user)) {
            session()->flash('register_success', 'สร้างบัญชีใหม่สำเร็จ');
            // return redirect('/login');
            return response()->json([
                'status' => 'success',
                'code' => 0
            ]);
        } else {
            return response()->json([
                'status' => 'fail',
                'code' => 1
            ]);
        }
    }
}
