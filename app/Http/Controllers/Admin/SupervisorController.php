<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSupervisorRequest;
use App\Http\Requests\Admin\UpdateSupervisorRequest;
use App\Repositories\SupervisorRepository;

class SupervisorController extends Controller
{
    private $supervisorRepository;
    public function __construct(SupervisorRepository $supervisorRepository)
    {
        $this->middleware('auth:admin');
        $this->supervisorRepository = $supervisorRepository;
    }

    public function store(StoreSupervisorRequest $request)
    {
        $brand = $this->supervisorRepository->store($request->validated());
        return response()->json("Item created successfully with id : $brand->id");
    }

    public function update(UpdateSupervisorRequest $request)
    {
        $brand = $this->supervisorRepository->update($request->validated());
        return response()->json("Item with id : $brand->id updated successfully");
    }

    public function delete($id)
    {
        $brand = $this->supervisorRepository->delete($id);
        return response()->json("Item with id : $brand->id deleted successfully");
    }

    public function index()
    {
        $text = isset(request()->text) ? request()->text : '';
        return $this->supervisorRepository->getSupervisors($text, request()->page_size, request()->status);
    }

    public function toggleStatus($id)
    {
        $brand = $this->supervisorRepository->toggleStatus($id);
        return response()->json("Status of item with id : $brand->id updated successfully");
    }

    public function find($id)
    {
        return $this->supervisorRepository->getSupervisor($id);
    }
}
