<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGeneralRateRequest;
use App\Http\Requests\Admin\UpdateGeneralRateRequest;
use App\Models\Employee;
use App\Models\Rate;
use App\Repositories\GeneralRateRepository;

class GeneralRateController extends Controller
{
    private $generalRateRepository;
    public function __construct(GeneralRateRepository $generalRateRepository)
    {
        $this->middleware('auth:admin');
        $this->generalRateRepository = $generalRateRepository;
    }

    public function store(StoreGeneralRateRequest $request)
    {
        $brand = $this->generalRateRepository->store($request->validated());
        return response()->json("Item created successfully with id : $brand->id");
    }

    public function update(UpdateGeneralRateRequest $request)
    {
        $brand = $this->generalRateRepository->update($request->validated());
        return response()->json("Item with id : $brand->id updated successfully");
    }

    public function delete($id)
    {
        $brand = $this->generalRateRepository->delete($id);
        return response()->json("Item with id : $brand->id deleted successfully");
    }

    public function index()
    {
        $text = isset(request()->text) ? request()->text : '';
        return $this->generalRateRepository->getGeneralRates($text, request()->page_size);
    }
    public function find($id)
    {
        return $this->generalRateRepository->getGeneralRate($id);
    }
    public function getEmployees()
    {
        return Employee::where("status", 1)->get();
    }
    public function getStudents($employeeId)
    {
        return Employee::find($employeeId)->students;
    }
    public function getRates()
    {
        return Rate::where("status", 1)->get();
    }
}
