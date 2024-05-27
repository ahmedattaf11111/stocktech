<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
    }
    public function register(Request $request)
    {
        // Validator request
        $v = Validator::make($request->all(), [
            'name' => "nullable",
            'email' => "nullable|unique:Users",
            'password' => "nullable",
            'phone' => "nullable",
            'country_id' => "nullable",
            'industry' => "nullable",
            'cv' => "nullable",
            'linkedin' => "nullable",
            'technology' => "nullable",
            'user_type' => "nullable",
        ]);
        $input = $v->validated();
        $input["type"] = "user";
        $input["password"] = Hash::make($input["password"]);
        if ($request->file("cv")) {
            $input["cv"] = $request->file("cv")->store("");
        }
        if ($v->fails()) {
            return response()->json($v->errors(), 422);
        }
        User::create($input);
        $this->login($request);
    }
    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);
        $credentials["type"] = "user";
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
        return redirect()->route("web.home");
    }
}
