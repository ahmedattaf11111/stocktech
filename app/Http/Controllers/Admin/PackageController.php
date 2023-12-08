<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePackageRequest;
use App\Http\Requests\Admin\UpdatePackageRequest;
use App\Models\Level;
use App\Repositories\packageRepository;

use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
    private $packageRepository;
    public function __construct(PackageRepository $packageRepository)
    {
        $this->middleware('auth:admin');
        $this->packageRepository = $packageRepository;
    }

    public function store(StorePackageRequest $request)
    {
        $brand = $this->packageRepository->store($request->validated());
        return response()->json("Item created successfully with id : $brand->id");
    }

    public function update(UpdatePackageRequest $request)
    {
        $input = $request->validated();
        $brand = $this->packageRepository->update($input);
        return response()->json("Item with id : $brand->id updated successfully");
    }

    public function delete($id)
    {
        $brand = $this->packageRepository->delete($id);
        return response()->json("Item with id : $brand->id deleted successfully");
    }

    public function index()
    {
        $text = isset(request()->text) ? request()->text : '';
        return $this->packageRepository->getPackages($text, request()->page_size, request()->status);
    }
    public function toggleStatus($id)
    {
        $brand = $this->packageRepository->toggleStatus($id);
        return response()->json("Status of item with id : $brand->id updated successfully");
    }
    public function find($id)
    {
        return $this->packageRepository->getPacakge($id);
    }

    public function getLevels()
    {
        return Level::get();
    }
}
