<?php

namespace App\Repositories;

use App\Exceptions\NotFoundException;
use App\Models\Employee;

class EmployeeRepository
{
    public function store($input)
    {
        return Employee::create($input);
    }
    public function update($input)
    {
        $brand = $this->find($input["id"]);
        $brand->update($input);
        if (isset($input["student_ids"])) {
            $brand->students()->sync($input["student_ids"]);
        }
        else{
            $brand->students()->sync([]);
        }
        return $brand;
    }
    public function delete($id)
    {
        $brand = $this->find($id);
        $brand->delete();
        return $brand;
    }
    public function getEmployees($text, $page_size, $status)
    {
        if ($page_size) {
            return Employee::where(function ($q) use ($text) {
                $q->where("name", "like", "%" . strtolower($text) . '%');
            })->when($status !== null, function ($q) use ($status) {
                $q->where("status", $status);
            })
                ->with(["mediaManager"])
                ->orderBy("id", "desc")->paginate($page_size);
        }
        return Employee::get();
    }
    public function toggleStatus($id)
    {
        $brand = $this->find($id);
        $brand->status = $brand->status == 1 ? 0 : 1;
        $brand->save();
        return $brand;
    }
    public function getEmployee($id)
    {
        return $this->find($id, ["national", "mediaManager","students"]);
    }
    //Commons
    private function find($id, $relations = [])
    {
        $brand = Employee::with($relations)->find($id);
        if (!$brand) throw  new NotFoundException;
        return $brand;
    }
}
