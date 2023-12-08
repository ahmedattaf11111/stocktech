<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AboutRequest;
use App\Models\About;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function store(AboutRequest $request)
    {
        $about = About::first();
        if (!$about) {
            About::create($request->validated());
        } else {
            $about->update($request->validated());
        }
    }
    public function getAbout()
    {
        return About::with("mediaManager")->first();
    }
}
