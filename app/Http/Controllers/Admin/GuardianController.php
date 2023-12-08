<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGuardianRequest;
use App\Http\Requests\Admin\UpdateGuardianRequest;
use App\Repositories\GuardianRepository;

class GuardianController extends Controller
{
    private $guardianRepository;
    public function __construct(GuardianRepository $guardianRepository)
    {
        $this->middleware('auth:admin');
        $this->guardianRepository = $guardianRepository;
    }

    public function store(StoreGuardianRequest $request)
    {
        $brand = $this->guardianRepository->store($request->validated());
        return response()->json("Item created successfully with id : $brand->id");
    }

    public function update(UpdateGuardianRequest $request)
    {
        $brand = $this->guardianRepository->update($request->validated());
        return response()->json("Item with id : $brand->id updated successfully");
    }

    public function delete($id)
    {
        $brand = $this->guardianRepository->delete($id);
        return response()->json("Item with id : $brand->id deleted successfully");
    }

    public function index()
    {
        $text = isset(request()->text) ? request()->text : '';
        return $this->guardianRepository->getGuardians($text, request()->page_size, request()->status);
    }
    public function toggleStatus($id)
    {
        $brand = $this->guardianRepository->toggleStatus($id);
        return response()->json("Status of item with id : $brand->id updated successfully");
    }
    public function find($id)
    {
        return $this->guardianRepository->getGuardian($id);
    }
}
