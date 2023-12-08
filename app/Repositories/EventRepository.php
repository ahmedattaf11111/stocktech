<?php

namespace App\Repositories;

use App\Exceptions\NotFoundException;
use App\Models\Event;

class EventRepository
{
    public function store($input)
    {
        return Event::create($input);
    }
    public function update($input)
    {
        $brand = $this->find($input["id"]);
        $brand->update($input);
        return $brand;
    }
    public function delete($id)
    {
        $brand = $this->find($id);
        $brand->delete();
        return $brand;
    }
    public function getEvents($text, $page_size, $status)
    {
        if ($page_size) {
            return Event::where(function ($q) use ($text) {
                $q->where("name", "like", "%" . strtolower($text) . '%');
            })->when($status !== null, function ($q) use ($status) {
                $q->where("status", $status);
            })
                ->with("mediaManager")
                ->orderBy("id", "desc")->paginate($page_size);
        }
        return Event::get();
    }
    public function toggleStatus($id)
    {
        $brand = $this->find($id);
        $brand->status = $brand->status == 1 ? 0 : 1;
        $brand->save();
        return $brand;
    }
    public function getEvent($id)
    {
        return $this->find($id, ["mediaManager"]);
    }
    //Commons
    private function find($id, $relations = [])
    {
        $brand = Event::with($relations)->find($id);
        if (!$brand) throw  new NotFoundException;
        return $brand;
    }
}
