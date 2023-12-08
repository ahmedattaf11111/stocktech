<?php

namespace App\Repositories;

use App\Exceptions\NotFoundException;
use App\Models\EmployeePlatform;

class EmployeePlatformRepository
{
    public function store($input)
    {
        return EmployeePlatform::create($input);
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
    public function getEmployeePlatforms($text, $page_size, $status)
    {
        if ($page_size) {
            return EmployeePlatform::where(function ($q) use ($text) {
                $q->where("name", "like", "%" . strtolower($text) . '%');
            })->when($status !== null, function ($q) use ($status) {
                $q->where("status", $status);
            })
                ->with("mediaManager")
                ->orderBy("id", "desc")->paginate($page_size);
        }
        return EmployeePlatform::get();
    }
    public function toggleStatus($id)
    {
        $brand = $this->find($id);
        $brand->status = $brand->status == 1 ? 0 : 1;
        $brand->save();
        return $brand;
    }
    public function getEmployeePlatform($id)
    {
        return $this->find($id, ["mediaManager"]);
    }
    //Commons
    private function find($id, $relations = [])
    {
        $brand = EmployeePlatform::with($relations)->find($id);
        if (!$brand) throw  new NotFoundException;
        return $brand;
    }
}
