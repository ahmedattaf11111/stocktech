<?php

namespace App\Repositories;

use App\Exceptions\NotFoundException;
use App\Models\Rate;

class RateRepository
{
    public function store($input)
    {
        return Rate::create($input);
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
    public function getRates($text, $page_size, $status)
    {
        if ($page_size) {
            return Rate::where(function ($q) use ($text) {
                $q->where("name", "like", "%" . strtolower($text) . '%');
            })->when($status !== null, function ($q) use ($status) {
                $q->where("status", $status);
            })
                ->orderBy("id", "desc")->paginate($page_size);
        }
        return Rate::get();
    }
    public function toggleStatus($id)
    {
        $brand = $this->find($id);
        $brand->status = $brand->status == 1 ? 0 : 1;
        $brand->save();
        return $brand;
    }
    public function getRate($id)
    {
        return $this->find($id);
    }
    //Commons
    private function find($id, $relations = [])
    {
        $brand = Rate::with($relations)->find($id);
        if (!$brand) throw  new NotFoundException;
        return $brand;
    }
}
