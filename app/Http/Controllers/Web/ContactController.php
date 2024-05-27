<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validator request
        $v = Validator::make($request->all(), [
            'name' => "required",
            'email' => "required",
            'subject' => "required",
            'message' => "required",
        ]);
        if ($v->fails()) {
            return response()->json($v->errors(), 422);
        }
        Contact::create($v->validated());
    }
    public function index()
    {

        return view(
            'web.contact',
            [
                "reviews" => Review::get(),
                "blogs" => Blog::take(2)->get(),
            ]
        );
    }
}
