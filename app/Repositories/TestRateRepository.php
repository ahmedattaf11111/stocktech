<?php

namespace App\Repositories;

use App\Exceptions\NotFoundException;
use App\Models\TestRate;

class TestRateRepository
{
    public function store($input)
    {
        $contest = TestRate::create($input);
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

    public function getTestRates($text, $page_size)
    {
        if ($page_size) {
            return TestRate::whereRelation("student", "name", "like", "%$text%")
                ->orWhereRelation("employee", "name", "like", "%$text%")
                ->with(["student", "employee", "test"])
                ->orderBy("id", "desc")->paginate($page_size);
        }
        return TestRate::get();
    }
    public function getTestRate($id)
    {
        return $this->find($id, ["student", "employee", "test"]);
    }
    //Commons
    private function find($id, $relations = [])
    {
        $brand = TestRate::with($relations)->find($id);
        if (!$brand) throw  new NotFoundException;
        return $brand;
    }
}
