<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    public function find($id)
    {
        return view("web.project-detail", [
            "project" => Project::with("category")->find($id),
            "latest_projects"=>Project::latest()->take(2)->get()
        ]);
    }
    
    public function index()
    {
        return view("web.project", [
            "projects" => Project::with("category")->get(),
        ]);
    }
}
