<?php

namespace App\Repositories;

use App\Exceptions\NotFoundException;
use App\Models\GeneralRate;

class GeneralRateRepository
{
    public function store($input)
    {
        $contest = GeneralRate::create($input);
        return $contest;
    }
    public function update($input)
    {
        $contest = $this->find($input["id"]);
        $contest->update($input);
        return $contest;
    }
    public function delete($id)
    {
        $brand = $this->find($id);
        $brand->delete();
        return $brand;
    }

    public function getGeneralRates($text, $page_size)
    {
        if ($page_size) {
            return GeneralRate::whereRelation("student", "name", "like", "%$text%")
                ->orWhereRelation("employee", "name", "like", "%$text%")
                ->with(["student", "employee"])
                ->orderBy("id", "desc")->paginate($page_size);
        }
        return GeneralRate::get();
    }
    public function getGeneralRate($id)
    {
        return $this->find($id, ["student", "employee"]);
    }
    //Commons
    private function find($id, $relations = [])
    {
        $brand = GeneralRate::with($relations)->find($id);
        if (!$brand) throw  new NotFoundException;
        return $brand;
    }
}
