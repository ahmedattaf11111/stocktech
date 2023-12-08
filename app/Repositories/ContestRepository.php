<?php

namespace App\Repositories;

use App\Exceptions\NotFoundException;
use App\Models\Contest;
use App\Models\ContestStudent;

class ContestRepository
{
    public function store($input)
    {
        $contest = Contest::create($input);
        if (isset($input["student_ids"])) {
            $contest->students()->sync($input["student_ids"]);
        } else {
            $contest->students()->sync([]);
        }
        return $contest;
    }
    public function update($input)
    {
        $contest = $this->find($input["id"]);
        $contest->update($input);
        if (isset($input["student_ids"])) {
            $contest->students()->sync($input["student_ids"]);
        } else {
            $contest->students()->sync([]);
        }
        return $contest;
    }
    public function delete($id)
    {
        $brand = $this->find($id);
        $brand->delete();
        return $brand;
    }
    public function getContests($text, $page_size, $status)
    {
        if ($page_size) {
            return Contest::where(function ($q) use ($text) {
                $q->where("name", "like", "%" . strtolower($text) . '%');
            })->when($status !== null, function ($q) use ($status) {
                $q->where("status", $status);
            })
                ->with(["students", "employee","contestType"])
                ->orderBy("id", "desc")->paginate($page_size);
        }
        return Contest::get();
    }
    public function toggleStatus($id)
    {
        $brand = $this->find($id);
        $brand->status = $brand->status == 1 ? 0 : 1;
        $brand->save();
        return $brand;
    }
    public function getContest($id)
    {
        return $this->find($id, ["employee", "students"]);
    }
    //Commons
    private function find($id, $relations = [])
    {
        $brand = Contest::with($relations)->find($id);
        if (!$brand) throw  new NotFoundException;
        return $brand;
    }
}
