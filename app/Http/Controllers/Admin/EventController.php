<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEventRequest;
use App\Http\Requests\Admin\UpdateEventRequest;
use App\Repositories\EventRepository;

class EventController extends Controller
{
    private $eventRepository;
    public function __construct(EventRepository $eventRepository)
    {
        $this->middleware('auth:admin');
        $this->eventRepository = $eventRepository;
    }

    public function store(StoreEventRequest $request)
    {
        $brand = $this->eventRepository->store($request->validated());
        return response()->json("Item created successfully with id : $brand->id");
    }

    public function update(UpdateEventRequest $request)
    {
        $brand = $this->eventRepository->update($request->validated());
        return response()->json("Item with id : $brand->id updated successfully");
    }

    public function delete($id)
    {
        $brand = $this->eventRepository->delete($id);
        return response()->json("Item with id : $brand->id deleted successfully");
    }

    public function index()
    {
        $text = isset(request()->text) ? request()->text : '';
        return $this->eventRepository->getEvents($text, request()->page_size, request()->status);
    }

    public function toggleStatus($id)
    {
        $brand = $this->eventRepository->toggleStatus($id);
        return response()->json("Status of item with id : $brand->id updated successfully");
    }

    public function find($id)
    {
        return $this->eventRepository->getEvent($id);
    }
}
