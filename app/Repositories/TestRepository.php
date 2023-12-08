<?php

namespace App\Repositories;

use App\Exceptions\NotFoundException;
use App\Models\Session;
use App\Models\Test;

class TestRepository
{
    public function store($input)
    {
        return Test::create($input);
    }
    public function delete($id)
    {
        $brand = $this->find($id);
        $brand->delete();
        return $brand;
    }
    public function getSessions()
    {
        return Test::get();
    }
    //Commons
    private function find($id, $relations = [])
    {
        $brand = Test::with($relations)->find($id);
        if (!$brand) throw  new NotFoundException;
        return $brand;
    }
}
