<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTestRequest;
use App\Models\Employee;
use App\Models\TestType;
use App\Repositories\TestRepository;

class TestController extends Controller
{
    private $testRepository;
    public function __construct(TestRepository $testRepository)
    {
        $this->middleware('auth:admin');
        $this->testRepository = $testRepository;
    }

    public function store(StoreTestRequest $request)
    {
        $brand = $this->testRepository->store($request->validated());
        return response()->json("Item created successfully with id : $brand->id");
    }

    public function delete($id)
    {
        $brand = $this->testRepository->delete($id);
        return response()->json("Item with id : $brand->id deleted successfully");
    }

    public function index()
    {
        return $this->testRepository->getSessions();
    }

    public function getEmployees()
    {
        return Employee::where("status", 1)->get();
    }
    public function getTypes()
    {
        return TestType::get();
    }
}
