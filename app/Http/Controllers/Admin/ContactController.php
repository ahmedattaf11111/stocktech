<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware("permission:super admin|view contact")->only(["index", "indexData"]);
        $this->middleware("permission:super admin|delete contact")->only("destroy");
    }

    public function index()
    {
        $items = Contact::latest()->paginate(request()->page_size);
        return view('admin.contact', ["items" => $items]);
    }

    public function indexData()
    {
        return Contact::when(request()->text, function ($q) {
            $q->where("name", "like", "%" . request()->text . "%")
                ->where("email", "like", "%" . request()->text . "%");
        })->latest()->paginate(request()->page_size);
    }
    public function destroy()
    {
        foreach (request()->ids as $id) {
            $team = Contact::find($id);
            $team->delete();
        }
    }
}
