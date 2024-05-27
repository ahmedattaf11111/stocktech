<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareerApplication;

class CareerApplicationController extends Controller
{
    
public function __construct()
{
    $this->middleware("permission:super admin|view application")->only(["index","indexData"]);
    $this->middleware("permission:super admin|delete application")->only("destroy");
    
}


    public function index()
    {
        $items = CareerApplication::with("career")->latest()->paginate(request()->page_size);
        return view('admin.career-application', ["items" => $items]);
    }

    public function indexData()
    {
        return CareerApplication::with("career")->when(request()->text, function ($q) {
            $q->where("name", "like", "%" . request()->text . "%")
                ->where("email", "like", "%" . request()->text . "%");
        })->latest()->paginate(request()->page_size);
    }
    public function destroy()
    {
        foreach (request()->ids as $id) {
            $team = CareerApplication::find($id);
            $team->delete();
        }
    }
}
