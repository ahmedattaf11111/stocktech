<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreContestRequest;
use App\Http\Requests\Admin\UpdateContestRequest;
use App\Models\ContestType;
use App\Models\Employee;
use App\Models\Student;
use App\Repositories\ContestRepository;

class ContestController extends Controller
{
    private $contestRepository;
    public function __construct(ContestRepository $contestRepository)
    {
        $this->middleware('auth:admin');
        $this->contestRepository = $contestRepository;
    }

    public function store(StoreContestRequest $request)
    {
        $brand = $this->contestRepository->store($request->validated());
        return response()->json("Item created successfully with id : $brand->id");
    }

    public function update(UpdateContestRequest $request)
    {
        $brand = $this->contestRepository->update($request->validated());
        return response()->json("Item with id : $brand->id updated successfully");
    }

    public function delete($id)
    {
        $brand = $this->contestRepository->delete($id);
        return response()->json("Item with id : $brand->id deleted successfully");
    }

    public function index()
    {
        $text = isset(request()->text) ? request()->text : '';
        return $this->contestRepository->getContests($text, request()->page_size, request()->status);
    }
    public function toggleStatus($id)
    {
        $brand = $this->contestRepository->toggleStatus($id);
        return response()->json("Status of item with id : $brand->id updated successfully");
    }
    public function find($id)
    {
        return $this->contestRepository->getContest($id);
    }
    public function getStudents()
    {
        return Student::where("status", 1)->get();
    }
    public function getEmployees()
    {
        return Employee::where("status", 1)->get();
    }
    public function getContestTypes()
    {
        return ContestType::get();
    }
}
