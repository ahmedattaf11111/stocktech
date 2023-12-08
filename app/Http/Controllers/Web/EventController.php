<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Event;

class EventController extends Controller
{
    public function __construct()
    {
    }

    public function getEvents()
    {
        if (request()->limit) {
            return Event::where("status", 1)->with("mediaManager")->take(request()->limit)->get();
        }
        if (request()->page_size) {
            return Event::with("mediaManager")
                ->orderBy("id", "desc")->paginate(request()->page_size);
        }
    }

}
