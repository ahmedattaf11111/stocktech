<?php

namespace App\Repositories;

use App\Exceptions\NotFoundException;
use App\Models\Session;

class SessionRepository
{
    public function store($input)
    {
        return Session::create($input);
    }
    public function delete($id)
    {
        $brand = $this->find($id);
        $brand->delete();
        return $brand;
    }
    public function getSessions()
    {
        return Session::with("employee")->get();
    }
    //Commons
    private function find($id, $relations = [])
    {
        $brand = Session::with($relations)->find($id);
        if (!$brand) throw  new NotFoundException;
        return $brand;
    }
}
