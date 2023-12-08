<?php

namespace App\Repositories;

use App\Exceptions\NotFoundException;
use App\Models\Student;

class StudentRepository
{
    public function store($input)
    {
        return Student::create($input);
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
    public function getStudents($text, $page_size, $status)
    {
        if ($page_size) {
            return Student::where(function ($q) use ($text) {
                $q->where("name", "like", "%" . strtolower($text) . '%');
            })->when($status !== null, function ($q) use ($status) {
                $q->where("status", $status);
            })
                ->with(["mediaManager"])
                ->orderBy("id", "desc")->paginate($page_size);
        }
        return Student::get();
    }
    public function toggleStatus($id)
    {
        $brand = $this->find($id);
        $brand->status = $brand->status == 1 ? 0 : 1;
        $brand->save();
        return $brand;
    }
    public function getStudent($id)
    {
        return $this->find($id, ["national", "birth", "level","mediaManager","guardian"]);
    }
    //Commons
    private function find($id, $relations = [])
    {
        $brand = Student::with($relations)->find($id);
        if (!$brand) throw  new NotFoundException;
        return $brand;
    }
}
