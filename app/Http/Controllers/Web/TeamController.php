<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Review;
use App\Models\Team;

class TeamController extends Controller
{
    public function index()
    {
        return view("web.team", [
            "teams" => Team::paginate(request()->page_size),
            "reviews" => Review::get(),
            "blogs" => Blog::take(2)->get(),
        ]);
    }
    public function find($id)
    {
        $team = Team::find($id);
        return view(
            'web.team-details',
            ["team" => $team]
        );
    }
}
