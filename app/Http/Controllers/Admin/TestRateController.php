<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTestRateRequest;
use App\Http\Requests\Admin\UpdateTestRateRequest;
use App\Models\Employee;
use App\Models\Test;
use App\Repositories\TestRateRepository;

class TestRateController extends Controller
{
    private $testRateRepository;
    public function __construct(TestRateRepository $testRateRepository)
    {
        $this->middleware('auth:admin');
        $this->testRateRepository = $testRateRepository;
    }

    public function store(StoreTestRateRequest $request)
    {
        $brand = $this->testRateRepository->store($request->validated());
        return response()->json("Item created successfully with id : $brand->id");
    }

    public function update(UpdateTestRateRequest $request)
    {
        $brand = $this->testRateRepository->update($request->validated());
        return response()->json("Item with id : $brand->id updated successfully");
    }

    public function delete($id)
    {
        $brand = $this->testRateRepository->delete($id);
        return response()->json("Item with id : $brand->id deleted successfully");
    }

    public function index()
    {
        $text = isset(request()->text) ? request()->text : '';
        return $this->testRateRepository->getTestRates($text, request()->page_size);
    }
    public function find($id)
    {
        return $this->testRateRepository->getTestRate($id);
    }
    public function getEmployees()
    {
        return Employee::where("status", 1)->get();
    }
    public function getStudents($employeeId)
    {
        return Employee::find($employeeId)->students;
    }
    public function getTests($employeeId)
    {
        return Test::where("employee_id", $employeeId)->get();
    }
}
