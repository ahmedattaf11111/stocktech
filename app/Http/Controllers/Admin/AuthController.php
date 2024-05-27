<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except("postLogin", "login");
    }
    public function verifyToken()
    {
        return ["verified" => true];
    }
    public function login()
    {
        return view('admin.login');
    }
    public function postLogin()
    {
        $credentials = request(['email', 'password']);
        $credentials["type"] = ["admin", "employee"];
        $credentials["status"] = 1;
        if (Auth::attempt($credentials)) {
            return response()->json(["message" => "authentication success"]);
        } else {
            return response()->json(["message" => "authentication faild"], 400);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route("admin.login");
    }
}
