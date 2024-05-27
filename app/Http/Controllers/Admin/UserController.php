<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        
        $this->middleware("permission:super admin|update user")->only("update");
        $this->middleware("permission:super admin|view user")->only(["index","indexData"]);
        $this->middleware("permission:super admin|delete user")->only("destroy");
        
    }


    public function index()
    {
        $items = User::with("country")->latest()->where("type","user")->paginate(request()->page_size);
        return view('admin.user', ["items" => $items]);
    }

    public function indexData()
    {
        return User::with("country")->when(request()->text, function ($q) {
            $q->where("name", "like", "%" . request()->text . "%")
                ->where("email", "like", "%" . request()->text . "%");
        })->where("type","user")->latest()->paginate(request()->page_size);
    }
    public function destroy()
    {
        foreach (request()->ids as $id) {
            $team = User::find($id);
            $team->delete();
        }
    }
    public function toggleStatus($id)
    {
        $user = User::find($id);
        $user->status = !$user->status;
        $user->save();
    }
}
