<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEmployeeRequest;
use App\Http\Requests\Admin\UpdateEmployeeRequest;
use App\Repositories\EmployeeRepository;
use App\Models\Student;

use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    private $employeeRepository;
    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->middleware('auth:admin');
        $this->employeeRepository = $employeeRepository;
    }

    public function store(StoreEmployeeRequest $request)
    {
        $brand = $this->employeeRepository->store($request->validated());
        return response()->json("Item created successfully with id : $brand->id");
    }

    public function update(UpdateEmployeeRequest $request)
    {
        $input = $request->validated();
        if ($request->file(("cv"))) {
            $input["cv"] = $request->file("cv")->store("");
        }
        $brand = $this->employeeRepository->update($input);
        return response()->json("Item with id : $brand->id updated successfully");
    }

    public function delete($id)
    {
        $brand = $this->employeeRepository->delete($id);
        if ($brand->cv) {
            Storage::delete($brand->cv);
        }
        return response()->json("Item with id : $brand->id deleted successfully");
    }

    public function index()
    {
        $text = isset(request()->text) ? request()->text : '';
        return $this->employeeRepository->getEmployees($text, request()->page_size, request()->status);
    }
    public function toggleStatus($id)
    {
        $brand = $this->employeeRepository->toggleStatus($id);
        return response()->json("Status of item with id : $brand->id updated successfully");
    }
    public function find($id)
    {
        return $this->employeeRepository->getEmployee($id);
    }

    public function getStudents()
    {
        return Student::where("status", 1)->get();
    }
}
