<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware("permission:super admin|create employee")->only(["store","storeRole"]);
        $this->middleware("permission:super admin|update employee")->only("update","updateRole");
        $this->middleware("permission:super admin|view employee")->only(["index", "indexData","indexDataRole"]);
        $this->middleware("permission:super admin|delete employee")->only("destroy","destroyRole");
    }

    public function index()
    {
        $items = User::with("roles")->where("type","employee")->orderBy("id", "desc")->paginate(request()->page_size);
        $roles = Role::with("users")->orderBy("id", "desc")->with("permissions")->paginate(request()->page_size_role);
        $allRoles = Role::get();
        return view('admin.employee', ["items" => $items, "itemsRole" => $roles,"roles"=>$allRoles]);
    }

    public function indexData()
    {
        return User::with("roles")->where("type","employee")->when(request()->text, function ($q) {
            $q->where("name", "like", "%" . request()->text . "%");
        })->orderBy("id", "desc")->paginate(request()->page_size);
    }

    public function store(Request $request)
    {
        // Validator request
        $v = Validator::make($request->all(), [
            'name' => "required",
            'email' => "required",
            'password' => "required",
            "roles" => "required|array",
            "image" => "required"
        ]);
        if ($v->fails()) {
            return response()->json($v->errors(), 422);
        }
        $input = $v->validated();
        $input["image"] = $request->file("image")->store("");
        $input["type"] = "employee";
        $input["password"] = Hash::make($request->password);
        $user = User::create($input);
        $user->syncRoles($request->roles);
    }
    
    public function toggleStatus($id)
    {
        $user = User::find($id);
        $user->status = !$user->status;
        $user->save();
    }
    public function update(Request $request, $id)
    {
        // Validator request
        $v = Validator::make($request->all(), [
            'name' => "required",
            'email' => "required",
            'password' => "nullable",
            "roles" => "required|array",
            "image" => "nullable"
        ]);
        if ($v->fails()) {
            return response()->json($v->errors(), 422);
        }
        $input = $v->validated();

        if($request->password){
            $input["password"] = Hash::make($request->password);
        }
        $user = User::find($id);
        if ($request->file("image")) {
            $input["image"] = $request->file("image")->store("");
            Storage::delete($user->image);
        }
        $user->update($input);
        $user->syncRoles($request->roles);
    }

    public function destroy()
    {
        foreach (request()->ids as $id) {
            $team = User::find($id);
            Storage::delete($team->image);
            $team->delete();
        }
    }

    public function storeRole(Request $request)
    {
        $v = Validator::make($request->all(), [
            'name' => "required",
            "permissions" => "required|array"
        ]);
        if ($v->fails()) {
            return response()->json($v->errors(), 422);
        }
        $role = Role::create(["name" => $request->name, "guard_name" => "admin"]);
        $role->syncPermissions($request->permissions);
    }
    public function destroyRole($id)
    {
        Role::destroy($id);
    }
    public function updateRole(Request $request, $id)
    {
        $v = Validator::make($request->all(), [
            'name' => "required",
            "permissions" => "required|array"
        ]);
        if ($v->fails()) {
            return response()->json($v->errors(), 422);
        }
        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();
        $role->syncPermissions($request->permissions);
    }
    public function indexDataRoles()
    {
        return Role::with("permissions","users")->orderBy("id", "desc")->paginate(request()->page_size);
    }
    public function getAllRoles(){
        return Role::get();
    }
}
