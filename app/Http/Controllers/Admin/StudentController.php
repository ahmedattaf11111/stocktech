<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreStudentRequest;
use App\Http\Requests\Admin\UpdateStudentRequest;
use App\Models\Guardian;
use App\Models\Level;
use App\Repositories\StudentRepository;
use PhpParser\Node\Expr\FuncCall;

class StudentController extends Controller
{
    private $studentRepository;
    public function __construct(StudentRepository $studentRepository)
    {
        $this->middleware('auth:admin');
        $this->studentRepository = $studentRepository;
    }

    public function store(StoreStudentRequest $request)
    {
        $brand = $this->studentRepository->store($request->validated());
        return response()->json("Item created successfully with id : $brand->id");
    }

    public function update(UpdateStudentRequest $request)
    {
        $brand = $this->studentRepository->update($request->validated());
        return response()->json("Item with id : $brand->id updated successfully");
    }

    public function delete($id)
    {
        $brand = $this->studentRepository->delete($id);
        return response()->json("Item with id : $brand->id deleted successfully");
    }

    public function index()
    {
        $text = isset(request()->text) ? request()->text : '';
        return $this->studentRepository->getStudents($text, request()->page_size, request()->status);
    }
    public function toggleStatus($id)
    {
        $brand = $this->studentRepository->toggleStatus($id);
        return response()->json("Status of item with id : $brand->id updated successfully");
    }
    public function getLevels()
    {
        return Level::get();
    }
    public function getGuardians()
    {
        return Guardian::where("status", 1)->get();
    }
    public function find($id)
    {
        return $this->studentRepository->getStudent($id);
    }
}
