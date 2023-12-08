<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEmployeePlatformRequest;
use App\Http\Requests\Admin\StoreEventRequest;
use App\Http\Requests\Admin\UpdateEmployeePlatformRequest;
use App\Http\Requests\Admin\UpdateEventRequest;
use App\Repositories\EmployeePlatformRepository;

class EmployeePlatformController extends Controller
{
    private $employeePlatformRepository;
    public function __construct(EmployeePlatformRepository $employeePlatformRepository)
    {
        $this->middleware('auth:admin');
        $this->employeePlatformRepository = $employeePlatformRepository;
    }

    public function store(StoreEmployeePlatformRequest $request)
    {
        $brand = $this->employeePlatformRepository->store($request->validated());
        return response()->json("Item created successfully with id : $brand->id");
    }

    public function update(UpdateEmployeePlatformRequest $request)
    {
        $brand = $this->employeePlatformRepository->update($request->validated());
        return response()->json("Item with id : $brand->id updated successfully");
    }

    public function delete($id)
    {
        $brand = $this->employeePlatformRepository->delete($id);
        return response()->json("Item with id : $brand->id deleted successfully");
    }

    public function index()
    {
        $text = isset(request()->text) ? request()->text : '';
        return $this->employeePlatformRepository->getEmployeePlatforms($text, request()->page_size, request()->status);
    }

    public function toggleStatus($id)
    {
        $brand = $this->employeePlatformRepository->toggleStatus($id);
        return response()->json("Status of item with id : $brand->id updated successfully");
    }

    public function find($id)
    {
        return $this->employeePlatformRepository->getEmployeePlatform($id);
    }
}
