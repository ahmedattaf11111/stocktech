<?php

namespace App\Repositories;

use App\Exceptions\NotFoundException;
use App\Models\Guardian;

class GuardianRepository
{
    public function store($input)
    {
        return Guardian::create($input);
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
    public function getGuardians($text, $page_size, $status)
    {
        if ($page_size) {
            return Guardian::where(function ($q) use ($text) {
                $q->where("name", "like", "%" . strtolower($text) . '%');
            })->when($status !== null, function ($q) use ($status) {
                $q->where("status", $status);
            })
                ->with(["mediaManager"])
                ->orderBy("id", "desc")->paginate($page_size);
        }
        return Guardian::get();
    }
    public function toggleStatus($id)
    {
        $brand = $this->find($id);
        $brand->status = $brand->status == 1 ? 0 : 1;
        $brand->save();
        return $brand;
    }
    public function getGuardian($id)
    {
        return $this->find($id, ["national","mediaManager"]);
    }
    //Commons
    private function find($id, $relations = [])
    {
        $brand = Guardian::with($relations)->find($id);
        if (!$brand) throw  new NotFoundException;
        return $brand;
    }
}
